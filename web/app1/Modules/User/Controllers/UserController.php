<?php namespace App\Modules\User\Controllers;


use App\Http\Controllers\Auth\UserAuth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\curl\CurlRequestHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


require public_path() . '/../vendor/autoload.php';

//require __DIR__ . '../vendor/autoload.php';

class UserController extends Controller

{
    protected $API_URL;
    protected $API_ACCESS_TOKEN;

    public function __construct()
    {
        $this->API_URL = env('API_URL');
        $this->API_ACCESS_TOKEN = env('API_ACCESS_TOKEN');
    }

    //--------------------------------- FUNCTIONS FOR TESTING PURPOSE ---------------------------------//

    function get_client_ip()
    {

        if (isset($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER('HTTP_CLIENT_IP');
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            return $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            return $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            return $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            return $_SERVER['REMOTE_ADDR'];
        else if (isset($_SERVER['REMOTE_HOST']))
            return $_SERVER['REMOTE_HOST'];
        else
            return null;
    }

    public function getClientIp()
    {
        $api_url = $this->API_URL . '/userTest';
        $data['searchValue'] = "food";
        $data['CLIENT_IP'] = $this->get_client_ip();

        $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

        dd($response);

    }

    public function test(Request $request)
    {

        dd(Session::get('instaffic_user')['token']);


        $api_url = $this->API_URL . '/profilePromotion/getFilterSettings';

        $data['token'] = Session::get('instaffic_user')['token'];


        $data['instaUserId'] = 2;
        $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);


//        dd( $response['data']);
        dd(empty($response['data']['tags']));
//        dd(isEmpty($response['data']['tags']));


        $api_url = $this->API_URL . '/profilePromotion/saveFilterSettings';

        $data['device_type'] = 'W';
        $data['token'] = Session::get('instaffic_user')['token'];
//        $data['tags'] = json_encode(["ram","food"],true);
        $data['tags'] = json_encode([json_encode(["name" => "ram", "id" => 234214])], true);


        $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
        dd($response);


        dd(Session::get('instaffic_user')['token']);


        if ($request->isMethod('post')) {

        } else {

            dd(Session::get('instaffic_user')['token']);


            $data = array(
                'id' => '1',
                'content' => 'Hello world!',
                'date' => date('Y-m-d H:i:s'),
            );
            $curl = new Curl();
            $curl->post('https://httpbin.org/post', $data);
            var_dump($curl->response);
        }

    }

    public function testApiRoute()
    {

        $api_url = $this->API_URL . '/userTest';
//dd($api_url);

        $data['searchValue'] = 'food';
        $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
        dd($response);

    }

    public function testdbconnection()
    {
        dd(DB::table('users')->select('*')->get());
    }


    //--------------------------------- FUNCTIONS FOR BEFORE AUTHENTICATING USER (BEFORE LOGIN) ----------------//

    public function index(Request $request)
    {
        $getData = $request->all();
        $showPageType = (isset($getData['type']) && !empty($getData['type'])) ? $getData['type'] : null;

        if (Session::has('instaffic_user')) {
            return redirect('/user/dashboard');
        }

        $errorMessage = '';
        if (Session::has('errorMessage')) {
            $errorMessage = json_decode(Session::get('errorMessage'), true);
            Session::forget('errorMessage');
        }

        $indexData = [
            'signup_using_affiliate' => (Session::has('signup_using_affiliate')) ? 'YES' : 'NO',
            'heading' => isset($errorMessage['heading']) ? $errorMessage['heading'] : '',
            'message' => isset($errorMessage['message']) ? $errorMessage['message'] : '',
            'showPageType' => $showPageType
        ];

        return view("User::index")->with($indexData);
    }

    public function home(Request $request)
    {
        $getData = $request->all();
        $showPageType = (isset($getData['type']) && !empty($getData['type'])) ? $getData['type'] : null;
        $indexData = [
            'showPageType' => $showPageType
        ];
        return view('User::auth.home')->with($indexData);
    }

    public function aboutUs()
    {
        return view('User::aboutUs');
    }

    public function termsAndCondition()
    {
        return view('User::termsAndCondition');
    }

    public function privacyPolicy()
    {
        return view('User::privacyPolicy');
    }

    public function login(Request $request)
    {
        if (Session::has('instaffic_user')) {
            return redirect('/user/dashboard');
        }

        if ($request->isMethod('post')) {

            $postData = $request->all();
            $rules = [
                'email' => 'required|email|exists:users,email',
                'password' => 'required',
                'user_timezone' => 'required'
            ];
            $message = [
                'email.required' => 'Email is required',
                'email.email' => 'Invalid Email Address',
                'email.exists' => 'This email id is does not exist in our database. Please signup to continue.',
                'password.required' => 'password is required',
            ];

            $validator = Validator::make($postData, $rules, $message);
            if (!$validator->fails()) {

                $api_url = $this->API_URL . '/userLogin';
                $data['API_ACCESS_TOKEN'] = $this->API_ACCESS_TOKEN;
                $data['device_type'] = 'W';
                $data['email'] = $postData['email'];
                $data['password'] = isset($postData['password']) ? $postData['password'] : '';
                $data['user_timezone'] = $postData['user_timezone'];
                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
//                dd($response);
                if (empty($response)) {
                    echo json_encode(['status' => 'failed', 'message' => ['The Server is temporarily unable to service your request due to maintainance downtime. Please try later']], true);
                } else {
                    if ($response['code'] === 200) {


                        if (UserAuth::attempt(['email' => $postData['email']])) {

                            if (Session::has('signup_using_affiliate')) {
                                Session::forget('signup_using_affiliate');
                            }

                            Session::put('instaffic_user', $response['data'][0]);

                            echo json_encode(['status' => 'success', 'message' => "Login successful"], true);
                        } else {
                            echo json_encode(['status' => 'failed', 'message' => UserAuth::getErrorMessage()], true);
                        }
                    } else {
                        echo json_encode(['status' => 'failed', 'message' => [$response['message']]], true);
                    }
                }
            } else {
                echo json_encode(['status' => 'failed', 'message' => $validator->messages()], true);
            }
        } else {
            return view("User::auth.login");
        }
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $postData = $request->all();

            $validator = Validator::make($postData, ['email' => 'required|email|unique:users,email']);
            if (!$validator->fails()) {

                $api_url = $this->API_URL . '/userSignup';
                $data['API_ACCESS_TOKEN'] = $this->API_ACCESS_TOKEN;
                $data['device_type'] = 'W';
                $data['email'] = $postData['email'];
                $data['password'] = isset($postData['password']) ? $postData['password'] : '';
                $data['user_timezone'] = $postData['user_timezone'];

                if (Session::has('signup_using_affiliate')) {
                    $data['refferalCode'] = Session::get('signup_using_affiliate')['refferalCode'];
                }
                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

                if (empty($response)) {
                    echo json_encode(['status' => 'failed', 'message' => ['The Server is temporarily unable to service your request due to maintainance downtime. Please try later']], true);
                } else {
                    if ($response['code'] === 200) {

                        if (Session::has('signup_using_affiliate')) {
                            Session::forget('signup_using_affiliate');
                        }

                        echo json_encode(['status' => 'success', 'message' => "Almost done, Confirm your email, We've sent you an email with the confirmation link"], true); //$response->message
                    } else {
                        echo json_encode(['status' => 'failed', 'message' => [$response['message']]], true);
                    }
                }
            } else {
                echo json_encode(['status' => 'failed', 'message' => $validator->messages()], true);
            }
        } else {
            return view('User::auth.register');
        }
    }

    public function verify_mail(Request $request)
    {

        if ($request->isMethod('get')) {

            $postData = $request->all();

            $errorData['heading'] = 'Error in Mail Verification';

            $rules = [
                'email' => 'required|exists:users,email',
//                'token' => 'required|exists:users,register_token'
            ];

            $validator = Validator::make($postData, $rules);
            if (!$validator->fails()) {

                $api_url = $this->API_URL . '/verifyMail';
                $data['API_ACCESS_TOKEN'] = $this->API_ACCESS_TOKEN;
                $data['device_type'] = 'W';
                $data['email'] = $postData['email'];
                $data['token'] = $postData['token'];
                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
                if (empty($response)) {
                    echo json_encode(['status' => 'failed', 'message' => ['The Server is temporarily unable to service your request due to maintainance downtime. Please try later']], true);
                } else {
                    if (Session::has('signup_using_affiliate')) {
                        Session::forget('signup_using_affiliate');
                    }

                    if ($response['code'] === 200) {
                        if (UserAuth::attempt(['email' => $postData['email']])) {
                            Session::put('instaffic_user', $response['data'][0]);
                            return redirect('/user/dashboard');
                        } else {
                            $errorData['message'] = UserAuth::getErrorMessage();
                            Session::put('errorMessage', json_encode($errorData, true));
                            return redirect('/');
                        }
                    } else {
                        $errorData['message'] = $response['message'];
                        Session::put('errorMessage', json_encode($errorData, true));
                        return redirect('/');
                    }
                }

            } else {

                $errorData['message'] = 'Invalid Email | Token key does not exist.';
                Session::put('errorMessage', json_encode($errorData, true));
                return redirect('/');
//                return view('User::auth.verify_mail')->with('errorMessage', 'Invalid Email | Token key does not exist.');
            }
        }
    }

    public function forgotPassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $postData = $request->all();

            $validator = Validator::make($postData, ['email' => 'required|email|exists:users,email']);
            if (!$validator->fails()) {
                $api_url = $this->API_URL . '/userForgotPassword';
                $data['API_ACCESS_TOKEN'] = $this->API_ACCESS_TOKEN;
                $data['device_type'] = 'W';
                $data['email'] = $postData['email'];
                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
                if ($response['code'] == 200) {
                    echo json_encode(['status' => 'success', 'message' => "We've sent a password reset link to " . $postData['email']], true); //$response->message
                } else {
                    echo json_encode(['status' => 'failed', 'message' => $response['message']], true);
                }

            } else {
                echo json_encode(['status' => 'failed', 'message' => [$validator->messages()]], true);
            }
        } else {
            return view('User::auth.forgotPassword');
        }
    }

    public function resetPassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $postData = $request->all();

            $rules = [
                'password' => 'required',
                'confirmPassword' => 'required|same:password'
            ];
            $validator = Validator::make($postData, $rules);

            if (!$validator->fails()) {

                $api_url = $this->API_URL . '/userForgetChangePassword';
                $data['API_ACCESS_TOKEN'] = $this->API_ACCESS_TOKEN;
                $data['device_type'] = 'W';
                $data['email'] = $postData['email'];
                $data['password'] = $postData['password'];
                $data['confirmPassword'] = $postData['confirmPassword'];
                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
                if ($response['code'] == 200) {
                    echo json_encode(['status' => 'success', 'message' => "New password has been set for " . $postData['email']], true);
                } else {
                    echo json_encode(['status' => 'failed', 'message' => [$response['message']]], true);
                }
            } else {
                echo json_encode(['status' => 'failed', 'message' => [$validator->messages()]], true);
            }

        } else {

            $postData = $request->all();
            $errorData['heading'] = 'Error in Password  Reset';

            $validator = Validator::make($postData, ['token' => 'required']);


            if (!$validator->fails()) {

                $api_url = $this->API_URL . '/verifyPasswordToken';
                $data['API_ACCESS_TOKEN'] = $this->API_ACCESS_TOKEN;
                $data['device_type'] = 'W';
                $data['token'] = $postData['token'];

                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

                if ($response['code'] == 200) {
                    return view('User::auth.forgotChangePassword')->with('email', $response['data']['email']);
                } else {

                    $errorData['message'] = $response['message'];
                    Session::put('errorMessage', json_encode($errorData, true));
                    return redirect('/');

//                    return view('User::auth.forgotChangePassword')->with(['ENABLE_ERROR_VIEW' => 'true', 'message' => $response['message']]);
                }
            } else {
                $errorData['message'] = 'Invalid password reset token';
                Session::put('errorMessage', json_encode($errorData, true));
                return redirect('/');
//                return view('User::auth.forgotChangePassword')->with(['ENABLE_ERROR_VIEW' => 'true', 'message' => 'Invalid password reset token']);
            }
        }
    }


    //--------------------------------- FUNCTIONS FOR AFTER AUTHENTICATING USER (AFTER LOGIN) ----------------//

    public function logout()
    {
        if (Session::has('instaffic_user')) {
            Session::forget('instaffic_user');
        }
        if (Session::has('INSTAGRAM_ACCOUNT')) {
            Session::forget('INSTAGRAM_ACCOUNT');
        }
        UserAuth::logout();

        return redirect('/');
    }

    public function welcome()
    {
        return view("User::welcome");
    }

    public function dashboard()
    {
        if (!Session::has('instaffic_user')) {
            return redirect('/');
        }

        $api_url = $this->API_URL . '/loadInstagramAccount';
        $data['token'] = Session::get('instaffic_user')['token'];
        $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

        if (empty($response)) {
            return view('User::dashboard')->with(['status' => 'failed', 'message' => ['The Server is temporarily unable to service your request due to maintainance downtime. Please try later'], 'data' => null]);
        } else {
            if ($response['code'] === 200) {
                if (Session::has('subscription_message')) {
                    $subscription_message = Session::get('subscription_message');
                    Session::forget('subscription_message');
                    Session::save();
                    return view('User::dashboard')->with(['status' => 'success', 'data' => $response['data'], 'subscription_message' => $subscription_message]);
                } else {
                    return view('User::dashboard')->with(['status' => 'success', 'data' => $response['data'], 'subscription_message' => null]);
                }
            } else {
                return view('User::dashboard')->with(['status' => 'failed', 'message' => $response['message'], 'data' => null]);
            }
        }
    }

    public function toMobileTheme(){
        return view('User::mobileTheme');
    }

}
