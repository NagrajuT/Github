<?php
/**
 * Created by PhpStorm.
 * User: GLB-212
 * Date: 9/9/2016
 * Time: 4:29 PM
 */

namespace App\Modules\User\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\curl\CurlRequestHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use \Illuminate\Support\Facades\File as FILE;
use Illuminate\Support\Facades\Validator;
use Svg\Tag\Image;


class UserProfileController extends Controller
{
    protected $API_URL;

    public function __construct()
    {
        $this->API_URL = env('API_URL');
    }


    //------------------------- ACCOUNT SETTINGS  --------(NEW)- NITISH KUMAR-------------//
    public function profileDetails(Request $request)
    {
        $data['token'] = Session::get('instaffic_user')['token'];
        $result = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/profile/details", $data), true);
        if (empty($result)) {
            //redirect To Error page
//                return view('User::error')->with(["errMessage" => 'Sorry,The page you are looking for is Unavailable or this link may have broken']);
            return 'Sorry,The page you are looking for is Unavailable or this link may have broken';
        }
        if ($result["code"] == 200 && $result["status"] == 'success') {
            if (isset($result['data'])) {
                return view('User::instagram.UserProfileSettings')->with(["userDetails" => $result['data']]);
            } else {
                return view('User::instagram.UserProfileSettings')->with(["userDetails" => []]);
            }
        } else {
            return view('User::instagram.UserProfileSettings')->with(["userDetails" => []]);
        }
    }

    public function changeProfileImage(Request $request)
    {
        $requestData = $request->all();
        $validator = Validator::make($requestData, ['image' => 'required']);
        if (!$validator->fails()) {
            $data['token'] = Session::get('instaffic_user')['token'];
            $data['image'] = $requestData['image'];
            $result = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/change/profile/image", $data), true);
//          dd($result);
            if (empty($result)) {
                return response()->json(array('code' => 400, 'status' => 'fail', 'message' => 'Service Un-available at the moment'));
            }
            if ($result["code"] == 200 && $result["status"] == 'success') {
                if (isset($result['data']) && !empty($result['data'])) {
                    Session::put('instaffic_user.profile_pic_url', $result['data']['profile_pic_url']);
                    Session::save();
                }
                return response()->json(array('code' => 200, 'status' => 'success', 'profile_image_url' => $result['data']['profile_pic_url'], 'message' => $result['message']));
            } else if ($result["code"] == 422) {
                return response()->json(array('code' => 422, 'status' => 'fail', 'message' => $result['message']));
            } else {
                return response()->json(array('code' => 400, 'status' => 'fail', 'message' => $result['message']));
            }
        } else {
            return response()->json(array('code' => 401, 'validation_errors' => $validator->errors()->all()));
        }
    }

    public function saveProfileDetails(Request $request)
    {
        $requestData = $request->all();

        $rules = [
            'username' => 'required|max:30',
            'full_name' => 'max:30',
            'paypal_email' => 'email',
            'contact_no' => 'numeric|digits_between:10,15',
        ];
        $validator = Validator::make($requestData, $rules);
        if (!$validator->fails()) {
            $data['token'] = Session::get('instaffic_user')['token'];
            $data['username'] = $requestData['username'];
            if (isset($requestData['full_name']) && !empty($requestData['full_name'])) {
                $data['full_name'] = $requestData['full_name'];
            }
            if (isset($requestData['paypal_email']) && !empty($requestData['paypal_email'])) {
                $data['paypal_email'] = $requestData['paypal_email'];
            }
            if (isset($requestData['contact_no']) && !empty($requestData['contact_no'])) {
                $data['contact_no'] = $requestData['contact_no'];
            }

            $result = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/save/profile/details", $data), true);
            if (empty($result)) {
                return response()->json(array('code' => 400, 'status' => 'fail', 'message' => 'Service Un-available at the moment'));
            }
            if ($result["code"] == 200 && $result["status"] == 'success') {
                return response()->json(array('code' => 200, 'status' => 'success', 'message' => $result['message']));
            } else if ($result["code"] == 422) {
                return response()->json(array('code' => 422, 'status' => 'fail', 'message' => $result['message']));
            } else {
                return response()->json(array('code' => 400, 'status' => 'fail', 'message' => $result['message']));
            }
        } else {
            return response()->json(array('code' => 401, 'status' => 'fail', 'validation_errors' => $validator->errors()->all()));
        }
    }

    public function changePassword(Request $request)
    {
        $requestData = $request->all();
        $rules = [
            'old_password' => 'required|min:6|max:20',
            'new_password' => 'required|min:6|max:20',
            're_new_password' => 'required|same:new_password',
        ];
        $message = [
            'old_password.required' => 'Old Password is Required.',
            'old_password.min' => 'Your old password was entered incorrectly. Please enter it again.',
            'old_password.max' => 'Old Password is Incorrect.',
            'new_password.required' => 'New Password is Required.',
            'new_password.min' => 'Password must be atleast 6 characters long.',
            'new_password.max' => 'Password must be less or equal 20 characters.',
            're_new_password.required' => 'Re Password is Required.',
            're_new_password.same' => 'password does not match.'
        ];
        $validator = Validator::make($requestData, $rules, $message);
        if (!$validator->fails()) {
            $data['token'] = Session::get('instaffic_user')['token'];
            $data['oldPassword'] = $requestData['old_password'];
            $data['newPassword'] = $requestData['new_password'];
            $result = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/userChangePassword", $data), true);
//            dd($result);
            if (empty($result)) {
                return response()->json(array('code' => 400, 'status' => 'fail', 'message' => 'Service Un-available at the moment'));
            }
            if ($result["code"] == 200 && $result["status"] == 'success') {
                return response()->json(array('code' => 200, 'status' => 'success', 'message' => $result['message']));
            } else if ($result["code"] == 422) {
                return response()->json(array('code' => 422, 'status' => 'fail', 'message' => $result['message']));
            } else {
                return response()->json(array('code' => 400, 'status' => 'fail', 'message' => $result['message']));
            }
        } else {
            return response()->json(array('code' => 401, 'status' => 'fail', 'validation_errors' => $validator->errors()->all()));
        }
    }

    public function savePrivacySettings(Request $request)
    {
        $requestData = $request->all();

        $rules['email_notification'] = ['required', 'regex:/^(YES|NO)+$/'];
        $rules['web_notification'] = ['required', 'regex:/^(YES|NO)+$/'];
        $message = [
            'email_notification.required' => 'Email Notification setting is missing.',
            'web_notification.required' => 'Web Notification setting is missing.',
        ];
        $validator = Validator::make($requestData, $rules, $message);
        if (!$validator->fails()) {
            $data['token'] = Session::get('instaffic_user')['token'];
            $data['email_notification'] = $requestData['email_notification'];
            $data['web_notification'] = $requestData['web_notification'];
            $result = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/save/privacy/settings", $data), true);
            if (empty($result)) {
                return response()->json(array('code' => 400, 'status' => 'fail', 'message' => 'Service Un-available at the moment'));
            }
            if ($result["code"] == 200 && $result["status"] == 'success') {
                return response()->json(array('code' => 200, 'status' => 'success', 'message' => $result['message']));
            } else if ($result["code"] == 422) {
                return response()->json(array('code' => 422, 'status' => 'fail', 'message' => $result['message']));
            } else {
                return response()->json(array('code' => 400, 'status' => 'fail', 'message' => $result['message']));
            }
        } else {
            return response()->json(array('code' => 401, 'status' => 'fail', 'validation_errors' => $validator->errors()->all()));
        }
    }

}