<?php namespace App\Modules\User\Controllers\AffiliateProgram;


use App\Http\Controllers\Auth\UserAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\curl\CurlRequestHandler;

use App\Modules\User\Models\Usermeta;
use App\Modules\User\Models\Affiliate_users;
use Illuminate\Support\Collection;
use DB;
use yajra\Datatables\Datatables;

require public_path() . '/../vendor/autoload.php';

//require __DIR__ . '../vendor/autoload.php';

class AffiliateController extends Controller
{

    protected $API_URL;

    public function __construct()
    {
        $this->API_URL = env('API_URL');
//        $userData = Session::get('instaffic_user');
//
//        if (isset($userData['user_type']) && $userData['user_type'] == 'PU' && isset($userData['status']) && $userData['status'] == 'PR') {
//            if (isset($userData['subscriptionEndDate']) && time() > intval($userData['subscriptionEndDate'])) {
//                $userData['status'] = 'PS';
//                unset($userData['subscriptionEndDate']);
//                Session::put('instaffic_user', $userData);
//            }
//        }
    }

    public function affiliate(Request $request)
    {

        if ($request->isMethod('post')) {

            $postData = $request->all();
            $rules = [
//                'email' => 'required|exists:users,email',
                'paypalEmail' => 'required|email',
                'contact' => 'required',
            ];
            $message = [
//                'email.required' => 'Invalid Email id',
                'paypalEmail.required' => 'Enter a valid paypal email',
                'paypalEmail.email' => 'Enter a valid paypal email',
                'contact.required' => 'Enter a contact number',
            ];
            $validator = Validator::make($postData, $rules, $message);

            if (!$validator->fails()) {
                $api_url = $this->API_URL . '/generateAffiliateLink';
                $data['device_type'] = 'W';
                $data['token'] = Session::get('instaffic_user')['token'];
                $data['name'] = $postData['name'];
                $data['contact'] = $postData['contact'];
                $data['paypalEmail'] = $postData['paypalEmail'];

                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
                if ($response['code'] === 200) {
                    $userData = Session::get('instaffic_user');
                    $userData['affliated_link'] = $response['data']['affiliateLink'];
                    Session::put('instaffic_user', $userData);

//                    return view('User::AffiliateProgram.showAffiliatedLink')->with('affiliateLink', $response['data']['affiliateLink']);
                    return view('User::AffiliateProgram.showAffiliatedLink')->with('affiliateData', $userData);
                } else {
//                    return back()->with('ErrorMsg', $response['message']);
                    return view('User::AffiliateProgram.affiliate')->with('ErrorMsg', $response['message']);
                }

            } else {
                return back()->withInput()->withErrors($validator);
            }
        } else {
            $userData = Session::get('instaffic_user');
            $data['token'] = Session::get('instaffic_user')['token'];
//            $result = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/getUserInAffiliate", $data), true);
            $result = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/get/instagram/accounts", $data), true);
            if ($result["code"] == 200 && $result["status"]== 'success') {

                if(isset($result['data']) && !empty($result['data']))
                {
                    $userData["Instagram_details"] = $result["data"];
                }else{
                    $userData["Instagram_details"] = [];
                }

                if (isset($userData['user_type']) && $userData['user_type'] == 'DU') {
                    $errorMessage = 'You are Restricted to access this service, please buy atleast one subscription package.';
                    return view('User::AffiliateProgram.affiliate')->with('ErrorMsg', $errorMessage);
                } else {
                    if (isset($userData['affliated_link']) && !empty($userData['affliated_link'])) {
                        return view('User::AffiliateProgram.showAffiliatedLink')->with('affiliateData', $userData);
                    } else {
                        return view('User::AffiliateProgram.affiliate');
                    }
                }



//                if(isset($result['data']) && !empty($result['data']))
//                {
//                    $userData["Instagram_details"] = $result["data"];
//                    if (isset($userData['user_type']) && $userData['user_type'] == 'DU') {
//                        $errorMessage = 'You are Restricted to access this service, please buy atleast one subscription package.';
//                        return view('User::AffiliateProgram.affiliate')->with('ErrorMsg', $errorMessage);
//                    } else {
//                        if (isset($userData['affliated_link']) && !empty($userData['affliated_link'])) {
//                            return view('User::AffiliateProgram.showAffiliatedLink')->with('affiliateData', $userData);
//                        } else {
//                            return view('User::AffiliateProgram.affiliate');
//                        }
//                    }
//                }else{
//                    $errorMessage = 'Please Add atleast one Instagram account.';
//                    return view('User::AffiliateProgram.affiliate')->with('ErrorMsg', $errorMessage);
//                }

            }else{
                $errorMessage = 'Error in API service';
                return view('User::AffiliateProgram.affiliate')->with('ErrorMsg', $errorMessage);
            }


        }
    }

    public function verifyRefferalCode(Request $request, $code)
    {
        $rules = [
            'code' => 'required|exists:usersmeta,refferal_code',
        ];
        $message = [
            'code.required' => 'Invalid Refferal code',
            'code.exists' => 'Invalid Refferal code',
        ];
        $postData['code'] = $code;
        $validator = Validator::make($postData, $rules, $message);

        if (!$validator->fails()) {
            $signUpData['refferalCode'] = $code;

            Session::put('signup_using_affiliate', $signUpData);

            return redirect('/');
        } else {
            return view('User::AffiliateProgram.affiliateError')->with('errMessage', $validator->messages());
        }

    }

    public function instaDirectMessageList()
    {
        $data = Input::all();

        $data['token'] = Session::get('instaffic_user')['token'];
        if (isset($data["users"])) {
            $data["users"] = json_encode($data["users"]);
        } else {
            $data["users"] = "[]";
        }
        $result = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/instaDirectMessageList", $data), true);
        if ($result["code"] == 200) {
            return 200;
        } else {
            return 400;
        }


    }


    //==========affiliate Instagram/Facebook message=====================(start)=============

    public function affiliateFacebookMessage1(Request $request)
    {
        ini_set('max_execution_time', 60);//in seconds
        if ($request->isMethod('post')) {
            $postData = $request->all();
            $rules = [
                'email' => 'required|email',
                'pass' => 'required',
            ];
            $message = [
                'email.required' => 'Email id required',
                'email.email' => 'Enter a valid email',
                'pass.required' => 'Password is required'
            ];
            $validator = Validator::make($postData, $rules, $message);

            if (!$validator->fails()) {

                $data['token'] = Session::get('instaffic_user')['token'];
                $data['email'] = $postData['email'];
                $data['pass'] = $postData['pass'];
                $data['fbText'] = $postData['fbText'];

                $result = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/facebookLoginAndShare", $data), true);
                if ($result["code"] == 200 && $result["status"] == 'success') {
                    return response()->json(array('code' => 504, 'message' => 'login successfull, we will share affiliate link'));
                } else {
                    return response()->json(array('code' => 502, 'message' => 'facebook login failed'));
                }
            } else {
                return response()->json(array('code' => 503, 'validation_errors' => $validator->errors()->all()));
            }
        } else {
            dd('get method in not allowed');//redirect to error page
        }

    }
    public function affiliateFacebookMessage(Request $request)
    {
//        dd($request->all());
        ini_set('max_execution_time', 60);//in seconds
        $postData = $request->all();
        $rules = [
            'email' => 'required|email',
            'pass' => 'required',
            'set_proxy'=>['required','regex:/^(YES|NO)+$/'],
            'ip'=>'required_if:set_proxy,"YES"|ip',
            'port'=>'required_if:set_proxy,"YES"|integer|min:0|max:65535',
            'username'=>'required_if:set_proxy,"YES"',
            'password'=>'required_if:set_proxy,"YES"'
        ];
        $message = [
            'email.required' => 'Facebook Email is required',
            'email.email' => 'Enter a valid facebook email',
            'pass.required' => 'Facebook Password is required',
            'ip.required_if' => 'Invalid IP',
            'ip.ip' => 'Invalid IP',
            'port.required_if' => 'Invalid Port',
            'port.integer' => 'Invalid Port',
            'port.min' => 'Invalid Port',
            'port.max' => 'Invalid Port',
            'username.required_if' => 'Invalid Username',
            'password.required_if' => 'Invalid Password'
        ];
        $validator = Validator::make($postData, $rules, $message);

        if (!$validator->fails()) {

            $data['token'] = Session::get('instaffic_user')['token'];
            $data['email'] = $postData['email'];
            $data['pass'] = $postData['pass'];
            $data['fbText'] = $postData['message'];
            $data['set_proxy'] = $postData['set_proxy'];
            if ($postData['set_proxy'] == 'YES') {
                $data['proxy_ip'] = $postData['ip'];
                $data['proxy_port'] = $postData['port'];
                $data['proxy_username'] = $postData['username'];
                $data['proxy_password'] = $postData['password'];
            }
//                dd($data);

            $result = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/facebookLoginAndShare", $data), true);
//            dd($result);
            if ($result["code"] == 200 && $result["status"] == 'success') {
                return response()->json(array('code' => 504, 'message' => 'login successfull, we will share affiliate link'));
            } else {
                return response()->json(array('code' => 502, 'message' => 'facebook login failed'));
            }
        } else {
            return response()->json(array('code' => 503, 'validation_errors' => $validator->getMessageBag()->toArray()));
        }

    }//modified function

    public function testFacebookProxy(Request $request)
    {

        $postData = $request->all();
        $rules = [
            'ip' => 'required|ip',
            'port' => 'required|integer|min:0|max:65535',
            'username' => 'required',
            'password' => 'required'
        ];
        $message = [
            'ip.required' => 'Invalid IP',
            'ip.ip' => 'Invalid IP',
            'port' => 'Invalid Port',
            'port.integer' => 'Invalid Port',
            'port.min' => 'Invalid Port',
            'port.max' => 'Invalid Port',
            'username.required' => 'Invalid Username',
            'password.required' => 'Invalid Password'
        ];
        $validator = Validator::make($postData, $rules, $message);

        if (!$validator->fails()) {

            $data['token'] = Session::get('instaffic_user')['token'];
            $data['proxy_ip'] = $postData['ip'];
            $data['proxy_port'] = $postData['port'];
            $data['proxy_username'] = $postData['username'];
            $data['proxy_password'] = $postData['password'];
//            dd($data);

            $result = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/check/account/proxy", $data), true);
            if(empty($result)){
                return response()->json(array('code' => 400, 'status'=>'failed','message' => 'Service unavailable at the moment.'));
            }
            if($result["code"] == 200 ||$result["code"] == 400 ||$result["code"] == 422 ){
                return $result;
            }else{
                return response()->json(array('code' => 400, 'status'=>'failed','message' => 'Service unavailable at the moment.'));
            }
        } else {
            return response()->json(array('code' => 503, 'validation_errors' => $validator->getMessageBag()->toArray()));
        }
    }

    public function affiliateInstagramMessage(Request $request)
    {

        if ($request->isMethod('post')) {

            $data = Input::all();
            $data['token'] = Session::get('instaffic_user')['token'];
            if (!isset($data["accounts"])) {
                return 402;
            }else if(!isset($data['token'])){
                return 401;
            }
            else{
                $data["accounts"] = json_encode($data["accounts"]);

            }
            $result = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/affiliateMessageToInstaFollower", $data), true);
            if ($result["code"] == 200 && $result["status"] == 'success') {
                return 200;
            }else{
                return 400;
            }
        } else {
            dd('get is not supported');
        }


    }

    //==========affiliate Instagram/Facebook message=====================(end)=============

    //-----------moved function------------

    
    public function getUserInAffiliate(Request $request)
    {
        if ($request->isMethod('post')) {

            $data['token'] = Session::get('instaffic_user')['token'];

            $result = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/getUserInAffiliate", $data), true);

            if ($result["code"]==200)
            {

                return $result;
            }
            else{
                return 201;
            }

        } else {
            return 202;
        }
    }

    //-----------moved function------------

    public function affiliateStatistics(Request $request)
    {
        if ($request->isMethod('post')) {
            $inputs['token'] = Session::get('instaffic_user')['token'];
            $stat_type = $request->graph_type;
            if ($stat_type == 'weekly') {
                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/affiliateWeeklyStatistics", $inputs), true);

                if ($response['code'] == 200 && $response['status'] == 'success') {
                    $resData = $response['data'];
                    $registered_graph_data = $resData['weeklyRegisteredData'];
                    $paid_graph_data = $resData['weeklySubscribedData'];
                    $amount_graph_data = $resData['weeklyAmount'];

                    return [
                        "registered_graph_data" => $registered_graph_data,
                        "paid_graph_data" => $paid_graph_data,
                        "amount_graph_data" => $amount_graph_data,
                    ];
                } else {
                    return [
                        "registered_graph_data" => [0, 0, 0, 0, 0, 0, 0],
                        "paid_graph_data" => [0, 0, 0, 0, 0, 0, 0],
                        "amount_graph_data" => [0, 0, 0, 0, 0, 0, 0],
                    ];
                }

            } else if ($stat_type == 'monthly') {
//                dd('hello');
                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/affiliateMonthlyStatistics", $inputs), true);
                if ($response['code'] == 200 && $response['status'] == 'success') {
                    $resData = $response['data'];
                    $registered_graph_data = $resData['monthlyRegisteredData'];
                    $paid_graph_data = $resData['monthlySubscribedData'];
                    $amount_graph_data = $resData['monthlyAmount'];

                    return [
                        "registered_graph_data" => $registered_graph_data,
                        "paid_graph_data" => $paid_graph_data,
                        "amount_graph_data" => $amount_graph_data,
                    ];
                } else {
                    return [
                        "registered_graph_data" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                        "paid_graph_data" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                        "amount_graph_data" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    ];
                }
            } else if ($stat_type == 'yearly') {
                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/affiliateYearlyStatistics", $inputs), true);
                if ($response['code'] == 200 && $response['status'] == 'success') {
                    $resData = $response['data'];
                    $registered_graph_data = $resData['yearlyRegisteredData'];
                    $paid_graph_data = $resData['yearlySubscribedData'];
                    $amount_graph_data = $resData['yearlyAmount'];

                    return [
                        "registered_graph_data" => $registered_graph_data,
                        "paid_graph_data" => $paid_graph_data,
                        "amount_graph_data" => $amount_graph_data,
                    ];
                } else {
                    return [
                        "registered_graph_data" => [0, 0, 0],
                        "paid_graph_data" => [0, 0, 0],
                        "amount_graph_data" => [0, 0, 0],
                    ];
                }
            }

//            if ($response["code"] == 400) {
//
//                return view('User::AffiliateProgram.affiliateStatistics');
//            }

        } else {
            return view('User::AffiliateProgram.affiliateStatistics');
        }


    }

    public function getRegisteredData(Request $request)
    {
        if($request->isMethod('post')){
            $refferedUserDetails=new Affiliate_users();
            $refferedData= new Collection();
            $id = Session::get('instaffic_user')['id'];
            $bind_data=[$id];
            $query = "SELECT id,username,email,created_at,status FROM users WHERE reffered_user_id=?";
            $select_result= $refferedUserDetails->getRefferedUsers(['rawQuery' => $query, 'bindParams' => $bind_data]);
            foreach($select_result as $key=>$value){
                $refferedData->push([
                    'id' => $key+1,
                    'email' => $value->email,
                    'created_at' => date('d/m/y',$value->created_at),
                    'time' => date('H:i:s',$value->created_at),
                    'status' => $value->status=='A'?'Active':'Inactive',
                ]);
            }
            return Datatables::of($refferedData)->make(true);
        }
    }

    public function getSubscribedData(Request $request)
    {
        if($request->isMethod('post')){
            $refferedUsersDetails=new Affiliate_users();
            $subscribedUserDetails=new Affiliate_users();
            $subscribedData= new Collection();
            $id = Session::get('instaffic_user')['id'];
            $bind_data=[$id];
            $query = "SELECT U.id as user_id,U.email,T.created_at, TP.package_type,TP.price FROM users as U JOIN usersmeta as UM on U.id=UM.user_id JOIN transactions as T on U.id = T.for_user_id JOIN time_packages as TP on T.time_package_id = TP.time_package_id  where UM.user_type='PU' and T.txn_status ='S' and U.reffered_user_id=?";
            $select_result= $subscribedUserDetails->getSubscribedUsers(['rawQuery' => $query, 'bindParams' => $bind_data]);
            foreach($select_result as $key=>$value){
                $subscribedData->push([
                    'user_id' => $key+1,
                    'email' => $value->email,
                    'created_at' => date('d/m/y',$value->created_at),
                    'time' => date('H:i:s',$value->created_at),
                    'price' => $value->price,
                    'package_type' => $value->package_type=='B'?'Business':'Private',
                ]);
            }
            return Datatables::of($subscribedData)->make(true);
        }

    }

    public function balanceCheck(Request $request){

        $data['token']=Session::get('instaffic_user')['token'];
        $balanceResponse=json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL."/checkBalance",$data),true);

        if($balanceResponse['code']==200 &&  $balanceResponse['status']=='success'){
            if(isset($balanceResponse['data'])){
                $data=$balanceResponse['data'];
                $totalRegistered=$data['totalRegistered'];
                $totalSubscribed=$data['totalSubscribed'];
                $myBalance=$data['myBalance'];
                return response()->json(['code'=>200 ,'status'=>'success','data'=>[
                    "totalRegistered"=>$totalRegistered,
                    "totalSubscribed"=>$totalSubscribed,
                    "myBalance"=>$myBalance]]);
            }else{
                return response()->json(['code'=>400 ,'status'=>'fail','data'=>[]]);
            }
        }else{
            return response()->json(['code'=>400 ,'status'=>'fail','data'=>[]]);

        }


    }

    //=================================(Affiliate Payments)===================================
    public function affiliatePayments(Request $request)
    {
//        dd('hello');

        $data['token'] = Session::get('instaffic_user')['token'];
        $balanceResponse = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/checkBalance", $data), true);
//        dd($balanceResponse);

        if ($balanceResponse['code'] == 200 && $balanceResponse['status'] == 'success') {
            if (!empty($balanceResponse['data'])) {
                $data = $balanceResponse['data'];
                $resData['totalRefferedUser'] = $data['totalRefferedUser'];
                $resData['totalPaidUser'] = $data['totalPaidUser'];
                $resData['totalUnpaidUser'] = $data['totalUnpaidUser'];
                $resData['balance'] = $data['balance'];
                $resData['totalSubscriptions'] = $data['totalSubscriptions'];
                $resData['totalEarningAmount'] = $data['totalEarningAmount'];
                $resData['totalPendingAmount'] = $data['totalPendingAmount'];
//                    dd($resData);


                return view('User::AffiliateProgram.affiliatePayments')->with(['data' => $resData]);
                return response()->json(['code' => 200, 'status' => 'success', 'data' => $resData]);
            } else {
                return response()->json(['code' => 400, 'status' => 'fail', 'data' => []]);
            }
        } else {
            return response()->json(['code' => 400, 'status' => 'fail', 'data' => []]);

        }


    }

    public function claimAffiliateAmount()
    {
        $data['token'] = Session::get('instaffic_user')['token'];
        $api_url = $this->API_URL . "/claim/affiliate/balance";
        $claimResponse = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
        if (!empty($claimResponse)) {
            return response()->json($claimResponse);
        } else {
            return 'Service Unavailable at the moment.Please try again later.';
        }
    }

    public function claimHistory(Request $request)
    {

        date_default_timezone_set($request->input('userTimezone'));
        $user_id = Session::get('instaffic_user')['id'];
//            $user_id=64;
        $select = [
//                'affiliate_claim_history_id',
            'claim_amount',
            'currency_code',
            'claim_status',
            'claim_status_message',
//                'admin_view_status',
            'created_at',
        ];
        $claimData = new Collection();
        $payment_obj = new affiliate_users();
        $result = $payment_obj->affClaimPaymentHistory($select, $user_id);
//        dd($result);
        foreach ($result as $key => $value) {
            $claimData->push([
                'id' => $key + 1,
                'claim_amount' => $value->currency_code . ' ' . $value->claim_amount,
                'claim_status' => ($value->claim_status=='P')?'Pending':(($value->claim_status=='PR')?'Processing':(($value->claim_status=='S')?'Success':'Failed')),
                'claim_status_message' => $value->claim_status_message,
//                    'admin_view_status' => ($value->admin_view_status===0)?'not seen by admin':'admin has seen this claim',
                'claim_date' => date('d/m/Y', $value->created_at),
                'claim_time' => date('h:i:s A', $value->created_at),
            ]);

        }
//        dd($claimData);
        return Datatables::of($claimData)->make(true);

    }
    //=================================(Affiliate Payments)===================================

}