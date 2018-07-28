<?php
/**
 * Created by PhpStorm.
 * User: GLB-212
 * Date: 9/9/2016
 * Time: 4:29 PM
 */

namespace App\Modules\User\Controllers;

use Illuminate\curl\CurlRequestHandler;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class ProfileManagenetController extends Controller
{
    protected $API_URL;

    public function __construct()
    {
        $this->API_URL = env('API_URL');
    }

    public function userDetails(Request $request)
    {
        $inputs['token'] = Session::get('instaffic_user')['token'];
        $result = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/getActiveInstaAccounts", $inputs), true);

//        dd(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/getActiveInstaAccounts", $inputs));
        if (empty($result)) {
            return view('User::ProfileManagement.distributionMessage');
        } else {
            if ($result["code"] == 200) {
                return view('User::ProfileManagement.distributionMessage')->with(['result' => $result['data']]);
            } else if ($result["code"] == 400) {
                return view('User::ProfileManagement.distributionMessage');
            }

        }

    }

    public function sendDistributionMessage(Request $request)
    {
        if ($request->isMethod('post')) {
//            Input::merge(array_map('trim', Input::all()));
            $postData = $request->all();
            $rules = [
                'insta_accounts' => 'required',
                'messageData' => 'required',
            ];
            $message = [
                'insta_accounts.required' => 'Please select any instagram account',
                'messageData.required' => 'Type some text Message',
            ];
            $validator = Validator::make($postData, $rules, $message);
            if (!$validator->fails()) {
//                print_r('validation passed');
                $data['token'] = Session::get('instaffic_user')['token'];
                $data["insta_accounts"] = json_encode($postData['insta_accounts'], true);

                if ($postData["insta_followers"] == 1) {
                    $data["insta_followers"] = 'YES';
                } else {
                    $data["insta_followers"] = 'NO';
                }
                if ($postData["insta_followings"] == 1) {

                    $data["insta_followings"] = 'YES';
                } else {
                    $data["insta_followings"] = 'NO';
                }
                if (isset($postData["insagram_hashtag"])) {
                    $data["insagram_hashtag"] = json_encode($postData["insagram_hashtag"]);
                } else {
                    $data["insagram_hashtag"] = json_encode(null);
                }

                if (isset($postData["id_by_usernames"])) {
                    $data["id_by_usernames"] = json_encode($postData["id_by_usernames"], true);
                } else {
                    $data["id_by_usernames"] = json_encode(null);
                }
                $data["messageData"] = json_encode($postData["messageData"], true);


                //modified by nitish
//        $result = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/FilterSettingsDistribution", $input), true);
                $distribution_result = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/distributionNotice", $data), true);
//dd(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/distributionNotice", $data));
//                dd(json_decode(json_encode($distribution_result), true));
//                return $distribution_result;
                if ($distribution_result["code"] == 200 && $distribution_result["status"] == 'success') {
                    return 200;
                } else {
                    return 400;
                }
            } else {
                return response()->json(array('code' => 503, 'validation_errors' => $validator->errors()->all()));
            }
        } else {
            dd('get mrethod is not allowed');
        }

    }

}