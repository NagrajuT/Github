<?php namespace App\Modules\Admin\Controllers;

use Amsify42\PaypalMassPayment\PaypalMassPaymentFacade;
use Amsify42\PaypalMassPayment\PaypalMassPaymentServiceProvider;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Admin\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modules\Admin\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


use Mockery\CountValidator\Exception;

use Illuminate\curl\CurlRequestHandler;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use PaypalMassPayment;

use Mdb\PayPal\Ipn\Event\MessageVerifiedEvent;
use Mdb\PayPal\Ipn\Event\MessageInvalidEvent;
use Mdb\PayPal\Ipn\Event\MessageVerificationFailureEvent;
use Mdb\PayPal\Ipn\ListenerBuilder\Guzzle\InputStreamListenerBuilder as ListenerBuilder;

use SaurabhBond\RecurringPayment\PaymentController;

require public_path() . '/../vendor/autoload.php';

class MassPaymentController extends Controller
{
    public function createMassPayment(Request $request){
        if(count($request->users)>250){
            return response()->json([
                'code' => 400,
                'status' => 'fail',
                'message'=>'Please select 250 or less user'
            ]);
        }
        else if(count($request->users)==0){
            return response()->json([
                'code' => 400,
                'status' => 'fail',
                'message'=>'Please select atleast one user'
            ]);
        }

        $modal=new Admin();
        $result=$modal->getUserPaymentDetails($request->users);
        $receivers=[];
        if(!empty($result)){
            $count=0;
            foreach($result as $key=>$value){
                $count++;
                $receivers[]=[
                    'ReceiverEmail' => $value->paypal_email,
                    'Amount'        => $value->claim_amount,
                    'UniqueId'      => $value->affiliate_claim_history_id,
                    'Note'          => "Smartffic Affiliate Payments"
                ];
            }
            $response = PaypalMassPayment::executeMassPay('Smartffic', $receivers);

            if(!empty($response) && $response['ACK']=='Success'){

                $Modal_obj=new User();
                $result=$Modal_obj->UpdatePaymentStatus($request->users);
                if($result){
                    return response()->json([
                        'code' => 200,
                        'status' => 'success',
                        'message'=>'Your payment was successfull'
                    ]);
                }else{
                    return response()->json([
                        'code' => 200,
                        'status' => 'success',
                        'message'=>'Failed to update Records'
                    ]);
                }
            }
            else{
                return response()->json([
                    'code' => 400,
                    'status' => 'fail',
                    'message'=>urldecode($response['L_LONGMESSAGE0'])
                ]);
            }
        }
    }

    public function ipnListner(Request $request)
    {
        $raw_post_data = file_get_contents('php://input');
        $raw_post_array = explode('&', $raw_post_data);
        $myPost = array();
        foreach ($raw_post_array as $keyval) {
            $keyval = explode('=', $keyval);
            if (count($keyval) == 2)
                $myPost[$keyval[0]] = urldecode($keyval[1]);
        }

        // read the IPN message sent from PayPal and prepend 'cmd=_notify-validate'
        $req = 'cmd=_notify-validate';
        if (function_exists('get_magic_quotes_gpc')) {
            $get_magic_quotes_exists = true;
        }
        foreach ($myPost as $key => $value) {
            if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
                $value = urlencode(stripslashes($value));
            } else {
                $value = urlencode($value);
            }
            $req .= "&$key=$value";
        }

        $res = $this->ipnHitCurlFunction($req);
//        dd($res);

        if (strcmp($res, "VERIFIED") == 0) {
            Log::info(['status' => 200, 'message' => 'IPN response is verified. Update your database.','data'=>$myPost]);
            if(!empty($myPost['txn_type']) && $myPost['txn_type']=='masspay'){
                $this->updateIpnData($myPost);
            }
            return json_encode(['status' => 200, 'message' => 'IPN response is verified']);
        } else if (strcmp($res, "INVALID") == 0) {
            Log::info(['status' => 400, 'message' => 'INVALID','faileddata'=>$myPost]);
            return json_encode(['status' => 400, 'message' => 'INVALID']);
        }

    }

    public function ipnHitCurlFunction($req)
    {
//        $ch = curl_init('https://www.sandbox.paypal.com/cgi-bin/webscr'); //sandbox
//        $ch = curl_init('https://www.paypal.com/cgi-bin/webscr'); // live
        $ch = curl_init('https://ipnpb.paypal.com/cgi-bin/webscr'); // live
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

        if (!($res = curl_exec($ch))) {
            // error_log("Got " . curl_error($ch) . " when processing IPN data");
            curl_close($ch);
            exit;
        }
        curl_close($ch);
        return $res;
    }

    public function updateIpnData($ipn_data){

        $payer_id = $ipn_data['payer_id'];
        $payment_date = $ipn_data['payment_date'];
        foreach ($ipn_data as $key => $value) {
            if (substr($key, 0, 12) == 'masspay_txn_') {
                $masspay_txn[$key] = $value;
            }
            if (substr($key, 0, 15) == 'receiver_email_') {
                $receiver_email[$key] = $value;
            }
            if (substr($key, 0, 7) == 'mc_fee_') {
                $mc_fee[$key] = $value;
            }
            if (substr($key, 0, 7) == 'status_') {
                $status[$key] = $value;
            }
            if (substr($key, 0, 10) == 'unique_id_') {
                $unique_id[$key] = $value;
            }
            if (substr($key, 0, 112) == 'payment_fee_') {
                $payment_fee[$key] = $value;
            }
        }

        $columns = " affiliate_claim_history_id, txn_id, receiver_paypal_email, mass_payment_fee,claim_status,claim_status_message, payment_status,payment_date,payer_id,updated_at";


        $receiver_status='P';
        $dbQuery = "INSERT INTO affiliate_claim_history (".$columns.") VALUES";
        for ($i = 1; $i <= count($masspay_txn); $i++) {
            if($status['status_' . $i]=='Completed'){
                $receiver_status='S';
            }
            $dbQuery .= "(" . $unique_id['unique_id_' . $i] . ",'" . $masspay_txn['masspay_txn_id_' . $i] . "','" . $receiver_email['receiver_email_' . $i] . "'," . $mc_fee['mc_fee_' . $i] . ",'".$receiver_status."','Paid by Admin','" . $status['status_' . $i] . "'," . time($payment_date) . ",'" . $payer_id . "'," . time() . "),";
        }
        $dbQuery = substr($dbQuery, 0, strlen($dbQuery) - 1);
        $dbQuery .= " ON DUPLICATE KEY UPDATE txn_id=VALUES(txn_id),receiver_paypal_email=VALUES(receiver_paypal_email),mass_payment_fee=VALUES(mass_payment_fee),claim_status=VALUES(claim_status),claim_status_message=VALUES(claim_status_message),payment_status=VALUES(payment_status),payment_date=VALUES(payment_date),payer_id=VALUES(payer_id),updated_at=VALUES(updated_at)";

        $modalObj = new User();
        $result = $modalObj->UpdateMassPaymentResponse($dbQuery);
        if ($result===true) {
            Log::info('payment Updated',[$ipn_data]);
        } else {
            Log::info('payment Failed===>',[$ipn_data]);
        }
    }

}