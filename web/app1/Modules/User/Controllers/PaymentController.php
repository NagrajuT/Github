<?php namespace App\Modules\User\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modules\User\Models\Payment_history;

use App\Modules\User\Models\Instagram_user;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Modules\Admin\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

//use PayPal\Service\AdaptivePaymentsService;
//use PayPal\Types\AP\PayRequest;
//use PayPal\Types\AP\Receiver;
//use PayPal\Types\AP\ReceiverList;
//use PayPal\Types\Common\RequestEnvelope;
use Illuminate\curl\CurlRequestHandler;

//use Yajra\Datatables\Datatables;
//use Yajra\Datatables\Facades\Datatables;
use yajra\Datatables\Datatables;

use stdClass;


class PaymentController extends Controller
{
    protected $API_URL;

    public function __construct()
    {
        $this->API_URL = env('API_URL');
    }


    //------------------------- SUBSCRIPTION PACKAGES --------------------------------------------------//
    public function packageLists()
    {
        $api_url = $this->API_URL . '/packageLists';
        $data['token'] = Session::get('instaffic_user')['token'];
        $packageData = array();
        $package_response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

        if ($package_response['code'] == 200) {
            $packageData = ($package_response['success'] == 'true') ? $package_response['data']['data'] : null;
        }

        $instagramUsersDetails = array();
        $instagramUsers = array();

        $api_url = $this->API_URL . '/get/instagram/accounts';
        $data['token'] = Session::get('instaffic_user')['token'];
        $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

        if ($response['code'] == 200) {
            $instagramUsers = ($response['status'] == 'success') ? $response['data'] : [];
        }

        if ($instagramUsers) {
            for ($i = 0; $i < sizeof($instagramUsers); $i++) {
                if ($instagramUsers[$i]['is_logged_in'] == 'Y' &&
                    $instagramUsers[$i]['is_user_disconnected'] == 'N' &&
                    $instagramUsers[$i]['has_account_locked'] == 'F'
                ) {
                    array_push($instagramUsersDetails, $instagramUsers[$i]);
                }
            }
        }
        return view('User::package.packagelists')->with(['packageData' => $packageData, 'userDetails' => $instagramUsersDetails]);
    }


    //------------------------- BUY PACKAGE -----------------------------------------------------------//

    public function makePayment(Request $request)
    {
        $postData = $request->all();
        $rules = [
            'packageId' => 'required',
            'instaUserId' => 'required'
        ];
        $message = [
            'packageId.required' => 'Please select some package',
            'instaUserId.required' => 'Please choose atleast one account'
        ];
        $validator = Validator::make($postData, $rules, $message);
        if (!$validator->fails()) {
            $postData = $request->all();
            $api_url = $this->API_URL . '/makePayment';

            $data['token'] = Session::get('instaffic_user')['token'];
            $data['time_package_id'] = $postData['packageId'];
            $data['for_instagram_user_ids'] = $postData['instaUserId'];

            //number of users
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                return back()->with(['errMessage' => 'Error In API service']);
            } else {
                if ($response['code'] === 200) {
                    return redirect($response['data']['url']);
                } else if ($response['code'] == 400) {
                    return Redirect::back()->with(['errMessage' => 'Some error occurred in paypal acknowledgement. Please reload the page and try again.']);
                }
            }
        } else {
            return back()->with(['validationErrMessage' => $validator->messages()]);
        }
    }

    public function paymentSuccess($payKey, Request $request)
    {
        $api_url = $this->API_URL . '/getPaymentdDetails';
        $data['payKey'] = $payKey;
        $data['token'] = Session::get('instaffic_user')['token'];
        $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
        if (empty($response)) {
            return back()->with(['errMessage' => 'Error in Api Service']);
        } else {
            if ($response['code'] === 200) {
                Session::put('subscription_message', 'Package subscribed successfully');
                Session::put('instaffic_user.user_type', 'PU');
                Session::save();
                return redirect('/user/dashboard');
            } else {
                return redirect('/user/packageLists')->with(['message' => 'Error in package subscription']);
            }
        }
    }

    public function paymentError()
    {
        return redirect('/user/packageLists')->with(['errMessage' => 'Some error occurred in payment. Please try again.']);

    }


    //------------------------- PAYMENT HISTORY ------------------------------------------------------//
    public function paymentHistory(Request $request)
    {
        if ($request->isMethod('post')) {
            date_default_timezone_set($request->input('userTimezone'));
            $user_id = Session::get('instaffic_user')['id'];
            $select = [
                'txn_id',
                'quantity',
                'currency_code',
                'amount',
                'txn_status',
                'payment_time',
                'payment_mode',
            ];
            $paymentData = new Collection();
            $payment_obj = new Payment_history();
            $result = $payment_obj->getPaymentDetails($select, $user_id);
            foreach ($result as $key => $value) {
                $paymentData->push([
                    'id' => $key + 1,
                    'transactionsId' => $value->txn_id,
                    'quantity' => $value->quantity,
                    'amount' => $value->currency_code . ' ' . $value->amount,
                    'status' => ($value->txn_status == 'S') ? 'success' : (($value->txn_status == 'P') ? 'Pending' : 'Failed'),
                    'date' => date('d/m/Y', $value->payment_time),
                    'paymentMode' => ($value->payment_mode == "P") ? '<i class="fa fa-paypal" style="color: green; margin-left: 15px;">aypal</i>' : 'In-App-Purchase'
                ]);

            }
            return Datatables::of($paymentData)->make(true);
        } else {
            return view('User::package.paymentHistory');
        }
    }

    public function convertUnixTimeToReadableFormat($unixtime = '')
    {

        $unixtime = floor($unixtime / 1000);

        $difference = time() - $unixtime;

        if ($difference < 1)
            return '0 seconds';

        $readable = [
            365 * 30 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60 => 'month',
            24 * 60 * 60 => 'day',
            60 * 60 => 'hour',
            60 => 'minute',
            1 => 'second'
        ];

        $readable_plural = [
            'year' => 'years',
            'month' => 'months',
            'day' => 'days',
            'hour' => 'hours',
            'minute' => 'minutes',
            'second' => 'seconds',
        ];


        foreach ($readable as $time => $str) {
            $res = $difference / $time;
            if ($res >= 1) {
                $res = round($res);
                return $res . ' ' . ($res > 1 ? $readable_plural[$str] : $str);
            }
        }
    }

//    =========================express checkout(start)===========================

    public function expressPaymentRequest(Request $request)
    {
        $postData = $request->all();
        $rules = [
            'packageId' => 'required|exists:time_packages,time_package_id',
            'instaUserId' => 'required'
        ];
        $message = [
            'packageId.required' => 'Please select some package',
            'packageId.exists' => 'Invalid package selection.',
            'instaUserId.required' => 'Please choose atleast one account'
        ];
        $validator = Validator::make($postData, $rules, $message);
        if (!$validator->fails()) {
            $postData = $request->all();
            $api_url = $this->API_URL . '/express/checkout/request';

            $data['token'] = Session::get('instaffic_user')['token'];
            $data['time_package_id'] = $postData['packageId'];
            $data['for_instagram_user_ids'] = $postData['instaUserId'];

            //number of users
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                return back()->with(['errMessage' => 'Service Unavailable']);
            } else {
                if ($response['code'] === 200) {
                    return redirect($response['data']['url']);
                } else if ($response['code'] == 400) {
                    return Redirect::back()->with(['errMessage' => 'Some error occurred in paypal acknowledgement. Please refresh the page and try again.']);
                }
            }
        } else {
            return back()->with(['validationErrMessage' => $validator->messages()]);
        }
    }

    public function expressPaymentSuccess(Request $request)
    {
        $postData = $request->all();
//        dd('$postData==>',$postData);
        if (!empty($postData['token']) && !empty($postData['PayerID'])) {

            $api_url = $this->API_URL . '/express/checkout/success';
            $data['payToken'] = $postData['token'];
            $data['payerID'] = $postData['PayerID'];
            $data['token'] = Session::get('instaffic_user')['token'];
//         dd($data);
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
//dd($response);

            if (empty($response)) {
                return back()->with(['errMessage' => 'Error in Api Service']);
            } else {
                if ($response['code'] === 200) {
//                Session::put('subscription_message', 'Package subscribed successfully');
                    Session::put('instaffic_user.user_type', 'PU');
                    Session::put('payment_data', json_encode(['status' => 'success', 'data' => $response['data']], true));
                    Session::save();
                    return redirect('/express/payment/invoice');
                } else {

//                Session::put('payment_data',json_encode(['status'=>'fail','data'=>$response['message']],true));
//                return redirect('/express/payment/invoice');
                    return redirect('/user/packageLists')->with(['message' => 'Error in package subscription']);
                }
            }
        }
    }

    public function expressPaymentInvoice()
    {
        if (Session::has('payment_data')) {
            $paymentData = Session::get('payment_data');
            Session::forget('payment_data');
            return view('User::package.paymentInvoice')->with(['data' => json_decode($paymentData, true)]);
        } else {
            return redirect('/user/dashboard');
        }

    }

    public function expressPaymentError()
    {
        return redirect('/user/packageLists')->with(['cancelMessage' => 'your have cancelled your last payment.']);

    }

//    =========================express checkout(end)=============================

}
