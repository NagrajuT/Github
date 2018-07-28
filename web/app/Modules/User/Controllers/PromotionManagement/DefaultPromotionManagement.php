<?php namespace App\Modules\User\Controllers\PromotionManagement;


use App\Http\Controllers\Auth\UserAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\curl\CurlRequestHandler;

use App\Modules\User\Models\Usermeta;
use Illuminate\Support\Collection;
use DB;
use Yajra\Datatables\Datatables;

require public_path() . '/../vendor/autoload.php';

//require __DIR__ . '../vendor/autoload.php';

class DefaultPromotionManagement extends Controller
{

    protected $API_URL;

    public function __construct()
    {
        $this->API_URL = env('API_URL');
    }

    public function defaultPromotion(Request $request)
    {
        $api_url = $this->API_URL . '/get/instagram/accounts';
        $data['token'] = Session::get('instaffic_user')['token'];
        $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
        if (empty($response)) {
            return view('User::PromotionManagement.Default.defaultPromotion')->with(['status' => 'failed', 'message' => 'Server is down. Please try again after few minute.']);
        } else {
            if ($response['code'] === 200)
                return view('User::PromotionManagement.Default.defaultPromotion')->with(['status' => 'success', 'accountList' => $response['data'], 'message' => $response['message']]);
            else
                return view('User::PromotionManagement.Default.defaultPromotion')->with(['status' => 'failed', 'message' => $response['message']]);
        }
    }

    public function defaultPromotionInstaId(Request $request, $insUserId)
    {
        $api_url = $this->API_URL . '/get/instagram/accounts';
        $data['token'] = Session::get('instaffic_user')['token'];
        $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
        if (empty($response)) {
            return view('User::PromotionManagement.Default.defaultPromotionDetails')->with(['status' => 'failed', 'message' => 'Server is down. Please try again after few minute.']);
        } else {
            if ($response['code'] === 200) {

                $selectedInstaUserDetails = array();

                foreach ($response['data'] as $item) {

                    if ($item['ins_user_id'] == $insUserId) {
                        $selectedInstaUserDetails = $item;
                        break;
                    }
                }

                $responseData['instaUserList'] = $response['data'];
                $responseData['selectedInstaDetails'] = $selectedInstaUserDetails;
                $responseData['selectedPromotionType'] = 'D';

                // ACTIVITY SETTING DATA
                $api_url = $this->API_URL . '/default/promotion/get/settings';
                $data1['insUserId'] = $insUserId;
                $data1['token'] = Session::get('instaffic_user')['token'];
                $response1 = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data1), true);

                $responseData['activityData']['gender'] = $response1['data']['default_gender_filter'];
                $responseData['activityData']['status'] = $response1['data']['default_promotion_status'];
                $responseData['activityData']['default_promotion_start_time'] = $response1['data']['default_promotion_start_time'];//added
                $responseData['activityData']['default_promotion_stop_time'] = $response1['data']['default_promotion_stop_time'];//added
                $responseData['activityData']['default_emergency_unfollow'] = $response1['data']['default_emergency_unfollow'];//added

                // STAT DATA
//                $api_url = $this->API_URL . '/default/promotion/get/stats';
//                $data2['insUserId'] = $insUserId;
//                $data2['token'] = Session::get('instaffic_user')['token'];
//                $response2 = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data2), true);
//
//                $response2['data']['totalTimeUsed'] = $this->convertDateTimeFormat($response2['data']['totalTimeUsed']);
//                $response2['data']['totalTimeLeft'] = $this->convertDateTimeFormat($response2['data']['totalTimeLeft']);
//                $responseData['statData'] = $response2['data'];


                $api_url = $this->API_URL . '/default/promotion/get/overview/stats';
                $data2['insUserId'] = $insUserId;
                $data2['token'] = Session::get('instaffic_user')['token'];
                $response2 = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data2), true);

                if ($response2["code"] == 200 && $response2["status"] == 'success') {
                    $response2['data']['total_time_used'] = $this->convertDateTimeFormat($response2['data']['total_time_used']);
                    $response2['data']['time_period_left'] = $this->convertDateTimeFormat($response2['data']['time_period_left']);
                    $responseData['statData'] = $response2['data'];
                } else {
                    $responseData['statData'] = [];
                }




                // INSTAGRAM USER PROFILE DATA
                $api_url = $this->API_URL . '/getInstaUserProfileDetails';
                $data3['InstaUsername'] = $selectedInstaUserDetails['username'];
                $data3['token'] = Session::get('instaffic_user')['token'];

                $profileResult = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data3), true);
                $profileData = null;
                if ($profileResult["code"] == 200 && $profileResult["status"] == 'success') {
                    $profileData = $profileResult["data"];
                } else {
                    $profileData = [];
                }
                $responseData['profileData'] = $profileData;

                return view('User::PromotionManagement.Default.defaultPromotionDetails')->with(['status' => 'success', 'data' => $responseData, 'message' => $response['message']]);
            } else
                return view('User::PromotionManagement.Default.defaultPromotionDetails')->with(['status' => 'failed', 'message' => $response['message']]);
        }

    }//small modofication start/stop added

    public function saveDefaultEmergencyUnfollow(Request $request)
	{
        $postData = $request->all();
        $rule = [
            'instaUserId' => 'required|exists:instagram_users,ins_user_id',
        ];
        $rules['emergency_unfollow'] = ['required', 'regex:/^(0|1)+$/'];
        $validator = Validator::make($postData, $rule);

        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/default/promotion/emergency/unfollow';
            $data['instaUserId'] = $postData['instaUserId'];
            $data['emergency_unfollow'] = $postData['emergency_unfollow'];
            $data['token'] = Session::get('instaffic_user')['token'];
//            dd($data);
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
//            dd($response);
            if (empty($response)) {
                echo json_encode(['status' => 'fail', 'message' => 'Error in service'], true);
            } else {
                if ($response['code'] == 200)
                    echo json_encode(['status' => 'success', 'message' => $response['message']], true);
                else
                    echo json_encode(['status' => 'fail', 'message' => $response['message']], true);
            }
        } else {
            echo json_encode(['status' => 'fail', 'message' => $validator->messages()], true);
        }
    }
	
    public function saveDefaultPromotionSettings(Request $request)
    {
        $postData = $request->all();

        $rule = [
            'insUserId' => 'required|exists:instagram_users,ins_user_id',
//            'status' => 'required',
            'genderType' => 'required'
        ];

        $validator = Validator::make($postData, $rule);


        if (!$validator->fails()) {

            $api_url = $this->API_URL . '/default/promotion/save/settings';
            $data['insUserId'] = $postData['insUserId'];
//            $data['status'] = $postData['status'];
            $data['gender'] = $postData['genderType'];
            $data['token'] = Session::get('instaffic_user')['token'];
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
//            dd($response);
            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'message' => 'Error in service'], true);
            } else {
                if ($response['code'] == 200)
                    echo json_encode(['status' => 'success', 'message' => $response['message']], true);
                else
                    echo json_encode(['status' => 'failed', 'message' => $response['message']], true);
            }


        } else {
            echo json_encode(['status' => 'failed', 'message' => $validator->messages()], true);
        }
    }//little modification: status removed

    //by nitish
    public function changeDefaultPromotionStatus(Request $request){
        $postData = $request->all();
        $rule = [
            'instaUserId' => 'required|exists:instagram_users,ins_user_id',
        ];
        $rules['currentStatus'] = ['required', 'regex:/^(0|1)+$/'];
        $validator = Validator::make($postData, $rule);

        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/update/default/promotion/status';
            $data['instaUserId'] = $postData['instaUserId'];
            $data['currentStatus'] = $postData['currentStatus'];
            $data['token'] = Session::get('instaffic_user')['token'];
//            dd($data);
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
//            dd($response);
            if (empty($response)) {
                echo json_encode(['status' => 'fail', 'message' => 'Error in service'], true);
            } else {
                if ($response['code'] == 200)
                    echo json_encode(['status' => 'success', 'message' => $response['message'],'data'=>$response['data']], true);
                else
                    echo json_encode(['status' => 'fail', 'message' => $response['message']], true);
            }
        } else {
            echo json_encode(['status' => 'fail', 'message' => $validator->messages()], true);
        }

    }

    public function getDefaultPromotionLogs(Request $request)
    {
        $postData = $request->all();

        $rule = [
            'insUserId' => 'required|exists:instagram_users,ins_user_id'
        ];
        $validator = Validator::make($postData, $rule);
        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/default/promotion/get/logs';
            $data['insUserId'] = $postData['insUserId'];
            $data['pagination'] = json_encode($postData['pagination'], true);

            $data['token'] = Session::get('instaffic_user')['token'];
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'message' => 'Error in service'], true);
            } else {
                if ($response['code'] == 200)
                    echo json_encode(['status' => 'success', 'data' => $response['data'], 'message' => $response['message']], true);
                else
                    echo json_encode(['status' => 'failed', 'message' => $response['message']], true);
            }
        } else {
            echo json_encode(['status' => 'failed', 'message' => $validator->messages()], true);
        }
    }

    public function getDefaultPromotionLogDetails(Request $request)
    {
        $postData = $request->all();

        $rules['insUserId'] = "required|exists:instagram_users,ins_user_id";
        $rules['pagination'] = "required";
        $rules['logTypeId'] = ['required', 'regex:/^(0|1|2|3|4)+$/'];


        $validator = Validator::make($postData, $rules);

        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/default/promotion/get/log/details';
            $data['insUserId'] = $postData['insUserId'];
            $data['logTypeId'] = $postData['logTypeId'];
            $data['pagination'] = json_encode($postData['pagination'], true);
            $data['token'] = Session::get('instaffic_user')['token'];

            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);


            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'message' => 'Error in service'], true);
            } else {
                if ($response['code'] == 200)
                    echo json_encode(['status' => 'success', 'data' => $response['data'], 'message' => $response['message']], true);
                else
                    echo json_encode(['status' => 'failed', 'message' => $response['message']], true);
            }
        } else {
            echo json_encode(['status' => 'failed', 'message' => $validator->messages()], true);
        }
    }

    public function getDefaultPromotionRecentLogDetails(Request $request)
    {
        $postData = $request->all();

        $rules['insUserId'] = "required|exists:instagram_users,ins_user_id";
        $rules['pagination'] = "required";
        $rules['logTypeId'] = ['required', 'regex:/^(0|1|2|3|4)+$/'];


        $validator = Validator::make($postData, $rules);

        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/default/promotion/get/recent/log/details';
            $data['insUserId'] = $postData['insUserId'];
            $data['logTypeId'] = $postData['logTypeId'];
            $data['pagination'] = json_encode($postData['pagination'], true);
            $data['token'] = Session::get('instaffic_user')['token'];
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'message' => 'Error in service'], true);
            } else {
                if ($response['code'] == 200)
                    echo json_encode($response, true);
                else
                    echo json_encode(['status' => 'failed', 'message' => $response['message']], true);
            }
        } else {
            echo json_encode(['status' => 'failed', 'message' => $validator->messages()], true);
        }
    }

    public function getDefaultPromotionOverviewStats(Request $request)
    {
        $postData = $request->all();

        $rules['insUserId'] = "required|exists:instagram_users,ins_user_id";

        $validator = Validator::make($postData, $rules);

        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/default/promotion/get/overview/stats';
            $data['insUserId'] = $postData['insUserId'];;
            $data['token'] = Session::get('instaffic_user')['token'];
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'message' => 'Error in service'], true);
            } else {
                if ($response['code'] == 200)
                    echo json_encode($response, true);
                else
                    echo json_encode(['status' => 'failed', 'message' => $response['message']], true);
            }
        } else {
            echo json_encode(['status' => 'failed', 'message' => $validator->messages()], true);
        }
    }


    public function prefix($value)
    {
        return ($value > 1) ? 's' : '';
    }
    public function convertDateTimeFormat($sec)
    {

//        $daysInMonth = intval(date('t', strtotime('last month')));
        $daysInMonth = 30;

//    $fm[YEAR,MONTHS,DAYS,HOURS,MINUTES,SECONDS]
        $fm = [
            floor($sec / 60 / 60 / 24 / $daysInMonth / 12),
            floor($sec / 60 / 60 / 24 / $daysInMonth) % 12,
            floor($sec / 60 / 60 / 24) % $daysInMonth,
            floor($sec / 60 / 60) % 24,
            floor($sec / 60) % 60,
            $sec % 60
        ];

//    dd($fm);
        $resultTimeFormat = '';

        if ($fm[0] > 0) {
            $resultTimeFormat .= $fm[0] . ' Year' . $this->prefix($fm[0]);
            if ($fm[1] > 0) {
                $resultTimeFormat .= ', ' . $fm[1] . ' Month' . $this->prefix($fm[1]);
            }
        } else {
            if ($fm[1] > 0) {
                $resultTimeFormat .= $fm[1] . ' Month' . $this->prefix($fm[1]);
                if ($fm[2] > 0) {
                    $resultTimeFormat .= ', ' . $fm[2] . ' Day' . $this->prefix($fm[2]);
                }
            } else {
                if ($fm[2] > 0) {
                    $resultTimeFormat .= $fm[2] . ' Day' . $this->prefix($fm[2]);
                    if ($fm[3] > 0) {
                        $resultTimeFormat .= ', ' . $fm[3] . ' Hour' . $this->prefix($fm[3]);
                    }
                } else {
                    if ($fm[3] > 0) {
                        $resultTimeFormat .= $fm[3] . ' Hour' . $this->prefix($fm[3]);
                        if ($fm[4] > 0) {
                            $resultTimeFormat .= ', ' . $fm[4] . ' Minute' . $this->prefix($fm[4]);
                        }
                    } else {
                        if ($fm[4] > 0) {
                            $resultTimeFormat .= $fm[4] . ' Minute' . $this->prefix($fm[4]);
                            if ($fm[5] > 0) {
                                $resultTimeFormat .= ', ' . $fm[5] . ' Second' . $this->prefix($fm[5]);
                            }
                        } else {
                            $resultTimeFormat .= $fm[5] . ' Second' . $this->prefix($fm[5]);
                        }
                    }
                }
            }
        }


        return $resultTimeFormat;
    }


}