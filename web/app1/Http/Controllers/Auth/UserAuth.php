<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\curl\CurlRequestHandler;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserAuth extends Controller
{
    private static $_instance = null;
    private static $_errorLogs = [
        '_ATTEMPT_ERROR' => null
    ];

    private static $_authDetails = [
        'email' => ''
    ];

    public function getInstance()
    {
        if (!is_object(self::$_instance))
            self::$_instance = new self();
        return self::$_instance;
    }

    public static function attempt($userData)
    {
        if (is_array($userData)) {
            if (isset($userData['email']) && ($userData['email'] != null || $userData['email'] != '')) {

                $data = UserAuth::getUserDetails($userData['email']);
                Session::put('userSessionData', $data);
                if (Session::has('userSessionData')) {
                    return true;
                } else {
                    self::$_errorLogs['_ATTEMPT_ERROR'] = 'Error in Session | Session not start';
                    return false;
                }

            } else {
                self::$_errorLogs['_ATTEMPT_ERROR'] = 'Invalid email';
                return false;
            }
        } else {
            self::$_errorLogs['_ATTEMPT_ERROR'] = "Object or String given, required array";
        }
    }

    public static function clearSession()
    {
        if (Session::has('instaffic_user')) {
            Session::forget('instaffic_user');
        }
        if (Session::has('userSessionData')) {
            Session::forget('userSessionData');
        }
    }

    public static function check()
    {
        if (Session::has('instaffic_user')) {
            $api_url = env('API_URL') . '/verifyToken';
            $data['API_ACCESS_TOKEN'] = env('API_ACCESS_TOKEN');
            $data['device_type'] = 'W';
            $data['token'] = Session::get('instaffic_user')['token'];
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (!empty($response)) {
                if ($response['code'] != 200) {
//                    dd($response);
                    self::clearSession();
                    return false;
                }
            } else {
                dd($response);
                self::clearSession();
                return false;
            }
        } else {
//            dd(Session::has('instaffic_user'));
            self::clearSession();
            return false;
        }
        return true;
    }

    private static function getUserDetails($email)
    {
        if (!empty($data = (array)DB::table('users')->select(['*'])->where('email', '=', $email)->first())) {
            return $data;
        } else {
            return null;
        }
    }

    public static function getErrorMessage()
    {
        return self::$_errorLogs['_ATTEMPT_ERROR'];
    }

    public static function id()
    {
        return (Session::has('userSessionData')) ? intval(Session::get('userSessionData')['id']) : null;
    }

//    public static function token()
//    {
//        return (Session::has('userSessionData')) ? Session::get('userSessionData')['token'] : null;
//    }

    public static function email()
    {
        return (Session::has('userSessionData')) ? Session::get('userSessionData')['email'] : null;
    }

    public static function logout()
    {
        self::clearSession();

//        if (Session::has('userSessionData')) {
//            Session::forget('userSessionData');
//        }
    }

}