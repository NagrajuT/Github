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

class FilterPromotionManagement extends Controller
{

    protected $API_URL;

    public function __construct()
    {
        $this->API_URL = env('API_URL');
    }

    //-------------------------  FILTER PROMOTION -----------------------------------------------------//
    public function filterPromotion(Request $request)
    {
        $api_url = $this->API_URL . '/get/instagram/accounts';
        $data['token'] = Session::get('instaffic_user')['token'];
        $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
        if (empty($response)) {
            return view('User::PromotionManagement.Filter.filterPromotion')->with(['status' => 'failed', 'message' => 'Server is down. Please try again after few minute.']);
        } else {
            if ($response['code'] === 200)
                return view('User::PromotionManagement.Filter.filterPromotion')->with(['status' => 'success', 'accountList' => $response['data'], 'message' => $response['message']]);
            else
                return view('User::PromotionManagement.Filter.filterPromotion')->with(['status' => 'failed', 'message' => $response['message']]);
        }
    }

    public function filterPromotionInstaId(Request $request, $insUserId)
    {
        $isValidInstaUserId = true;

        if ($insUserId != null) {
            $postData['ins_user_id'] = $insUserId;
            $rule = ['ins_user_id' => 'numeric|exists:instagram_users,ins_user_id,added_by_user_id,' . Session::get('instaffic_user')['id']];
            $validator = Validator::make($postData, $rule);
            if ($validator->fails()) {
                $isValidInstaUserId = false;
            }
        }

        if ($isValidInstaUserId) {

            $api_url = $this->API_URL . '/get/instagram/accounts';
            $data['token'] = Session::get('instaffic_user')['token'];
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                return view('User::PromotionManagement.Filter.filterPromotionDetails')->with(['status' => 'failed', 'message' => 'Server is down. Please try again after few minute.']);
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
                    $responseData['selectedPromotionType'] = 'F';

                    // ACTIVITY SETTING DATA
                    $api_url = $this->API_URL . '/profilePromotion/getFilterSettings';
                    $data1['instaUserId'] = $insUserId;
                    $data1['token'] = Session::get('instaffic_user')['token'];
                    $activityData = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data1), true);
                    if ($activityData["code"] == 200 && $activityData["status"] == 'success') {
                        if (!empty($activityData['data']['tags'])) {
                            $activityData['data']['tags'] = implode(',', $activityData['data']['tags']);
                        }
                        if (!empty($activityData['data']['locations'])) {
                            $activityData['data']['locations'] = json_encode($activityData['data']['locations'], true);
                        }
                        if (!empty($activityData['data']['usernames'])) {
                            $activityData['data']['usernames'] = json_encode($activityData['data']['usernames'], true);
                        }
                        $responseData['activityData'] = $activityData['data'];
                    } else {
                        $responseData['activityData'] = [];
                    }


                    // STAT DATA
//                    $api_url = $this->API_URL . '/filter/promotion/get/stats';
//                    $data2['insUserId'] = $insUserId;
//                    $data2['token'] = Session::get('instaffic_user')['token'];
//                    $response2 = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data2), true);
//
//                    if ($activityData["code"] == 200 && $activityData["status"] == 'success') {
//                        $response2['data']['totalTimeUsed'] = $this->convertDateTimeFormat($response2['data']['totalTimeUsed']);
//                        $response2['data']['totalTimeLeft'] = $this->convertDateTimeFormat($response2['data']['totalTimeLeft']);
//                        $responseData['statData'] = $response2['data'];
//                    } else {
//                        $responseData['statData'] = [];
//                    }


                    $api_url = $this->API_URL . '/filter/promotion/get/overview/stats';
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




//                dd($responseData);

                    // INSTAGRAM USER PROFILE DATA
//                $api_url = $this->API_URL . '/get/insta/user/media/feed';
//                $data4['instaUserId'] = $insUserId;
//                $data4['pagination'] = json_encode(['pagination_id' => '', 'next_max_id' => '']);
//                $data4['token'] = Session::get('instaffic_user')['token'];
//                $profileResult = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data4), true);
//                $profileData = null;
//                if ($profileResult["code"] == 200 && $profileResult["status"] == 'success') {
//                    $responseData['profileData'] = $profileResult["data"];;
//                } else {
//                    $responseData['profileData'] = [];
//                }

                    $api_url = $this->API_URL . '/getInstaUserProfileDetails';
                    $data4['token'] = Session::get('instaffic_user')['token'];
                    $data4['instaUserId'] = $insUserId;
                    $data4['InstaUsername'] = $selectedInstaUserDetails['username'];

                    $profileResult = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data4), true);

                    if ($profileResult["code"] == 200 && $profileResult["status"] == 'success') {
                        $responseData['profileData'] = $profileResult["data"];;
                    } else {
                        $responseData['profileData'] = [];
                    }

                    return view('User::PromotionManagement.Filter.filterPromotionDetails')->with(['status' => 'success', 'data' => $responseData, 'message' => $response['message']]);

                } else {
                    return view('User::PromotionManagement.Filter.filterPromotionDetails')->with(['status' => 'failed', 'message' => $response['message']]);
                }
            }
        }else{
            return view('User::error_404');
        }

    }

    //added by nitish
    public function changeFilterPromotionStatus(Request $request){
        $postData = $request->all();
        $rule = [
            'instaUserId' => 'required|exists:instagram_users,ins_user_id',
        ];
        $rules['currentStatus'] = ['required', 'regex:/^(0|1)+$/'];
        $validator = Validator::make($postData, $rule);

        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/update/filter/promotion/status';
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

	public function saveFilterEmergencyUnfollow(Request $request)
    {
        $postData = $request->all();
        $rule = [
            'instaUserId' => 'required|exists:instagram_users,ins_user_id',
        ];
        $rules['emergency_unfollow'] = ['required', 'regex:/^(0|1)+$/'];
        $validator = Validator::make($postData, $rule);

        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/filter/promotion/emergency/unfollow';
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
	
    public function saveFilterPromotionSettings(Request $request)
    {
        $rules['instaUserId'] = "required|exists:config_filters,for_instagram_user_id";
        $rules['like'] = ['required', 'regex:/^(0|1)+$/'];
        $rules['follow'] = ['required', 'regex:/^(0|1)+$/'];
        $rules['unfollow'] = ['required', 'regex:/^(0|1)+$/'];
        $rules['unfollow_option'] = ['required', 'regex:/^(1|2)+$/'];
        $rules['gender'] = ['required', 'regex:/^(1|2|3)+$/'];
        $rules['mediaType'] = ['required', 'regex:/^(A|V|I)+$/'];
        $rules['mediaAge'] = ['required', 'regex:/^(new|1hr|3hr|today|yesterday|3d|1w|2w|1m|2m|randomly)+$/'];

        $postData = $request->all();

        $validator = Validator::make($postData, $rules);

        if (!$validator->fails()) {

            $api_url = $this->API_URL . '/profilePromotion/saveFilterSettings';
            $data['token'] = Session::get('instaffic_user')['token'];

            $data['instaUserId'] = $postData['instaUserId'];
            $data['like'] = $postData['like'];
            $data['follow'] = $postData['follow'];
            $data['unfollow'] = $postData['unfollow'];
            $data['unfollow_option'] = $postData['unfollow_option'];

            $data['tags'] = (isset($postData['hashtags']) && !empty($postData['hashtags'])) ? $postData['hashtags'] : "[]";
            $data['usernames'] = (isset($postData['usernames']) && !empty($postData['usernames'])) ? $postData['usernames'] : "[]";
            $data['locations'] = (isset($postData['locations']) && !empty($postData['locations'])) ? $postData['locations'] : "[]";

            $data['gender'] = $postData['gender'];
            $data['media_age'] = $postData['mediaAge'];
            $data['media_type'] = $postData['mediaType'];


            if (!empty($postData['hashtags'])) {
                $hashtags = explode(',', $postData['hashtags']);
                $tags = '';
                $tagsCount = count($hashtags);
                for ($i = 0; $i < $tagsCount; $i++) {
                    $tags .= '"' . $hashtags[$i] . '"';
                    if ($i != ($tagsCount - 1)) {
                        $tags .= ',';
                    }
                }
                $data['tags'] = '[' . $tags . ']';
            }

//            dd($data,CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data));
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'code' => 400, 'message' => 'Temporary this service is down'], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode($response, true);
                else
                    echo json_encode($response, true);
            }
        } else {
            echo json_encode(['status' => 'failed', 'code' => 400, 'message' => $validator->messages()], true);
        }

    }

    public function getFilterPromotionLogs(Request $request)
    {
        $postData = $request->all();
        $rule = [
            'insUserId' => 'required|exists:instagram_users,ins_user_id',
            'pagination' => 'required'
        ];
        $validator = Validator::make($postData, $rule);

        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/filter/promotion/get/logs';
            $data['insUserId'] = $postData['insUserId'];
            $data['pagination'] = json_encode($postData['pagination'], true);
            $data['token'] = Session::get('instaffic_user')['token'];
//            dd($data);
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


    public function getFilterPromotionLogDetails(Request $request)
    {
        $postData = $request->all();

        $rules['insUserId'] = "required|exists:instagram_users,ins_user_id";
        $rules['pagination'] = "required";
        $rules['logTypeId'] = ['required', 'regex:/^(0|1|2|3|4)+$/'];


        $validator = Validator::make($postData, $rules);

        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/filter/promotion/get/log/details';
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

    public function getFilterPromotionRecentLogDetails(Request $request)
    {
        $postData = $request->all();

        $rules['insUserId'] = "required|exists:instagram_users,ins_user_id";
        $rules['pagination'] = "required";
        $rules['logTypeId'] = ['required', 'regex:/^(0|1|2|3|4)+$/'];


        $validator = Validator::make($postData, $rules);

        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/filter/promotion/get/recent/log/details';
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

    public function getFilterPromotionOverviewStats(Request $request)
    {
        $postData = $request->all();

        $rules['insUserId'] = "required|exists:instagram_users,ins_user_id";

        $validator = Validator::make($postData, $rules);

        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/filter/promotion/get/overview/stats';
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



    //-------------------------  SETTINGS MANAGER -----------------------------------------------------//
    //New Function Modofied by Chandrakar Ramkishan
    public function saveActivitySettings(Request $request)
    {
        $postData = $request->all();
        $rules = [
            'instaUserId' => 'required|exists:config_filters,for_instagram_user_id',
            'presetName' => 'required|min:6|max:32|unique:manager_settings,manager_settings_name,NULL,id,for_user_id,' . Session::get('instaffic_user')['id']
        ];

        $validator = Validator::make($postData, $rules);
        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/save/activity/settings';
            $data['instaUserId'] = $postData['instaUserId'];
            $data['presetName'] = $postData['presetName'];
            $data['token'] = Session::get('instaffic_user')['token'];

            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'code' => 400, 'message' => 'Temporary this service is down'], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode($response, true);
                else
                    echo json_encode($response, true);
            }
        } else {
            echo json_encode(['code' => 400, 'status' => 'failed', 'message' => $validator->messages()], true);
        }
    }

    public function getActivitySettingsPreset()
    {
        $api_url = $this->API_URL . '/get/activity/settings/preset';
        $data['token'] = Session::get('instaffic_user')['token'];
//       dd(CurlRequestHandler::getInstance()->curlUsingPost($api_url,$data));
        $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
        if (empty($response)) {
            echo json_encode(['status' => 'failed', 'code' => 400, 'message' => 'Temporary this service is down'], true);
        } else {
            if ($response['code'] === 200)
                echo json_encode($response, true);
            else
                echo json_encode($response, true);
        }
    }

    public function deleteActivitySettingsPreset(Request $request)
    {
        $postData = $request->all();
        $rules = [
            'manager_settings_id' => 'required|exists:manager_settings,manager_settings_id'
        ];

        $validator = Validator::make($postData, $rules);
        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/delete/activity/settings/preset';
            $data['manager_settings_id'] = $postData['manager_settings_id'];
            $data['token'] = Session::get('instaffic_user')['token'];

            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'code' => 400, 'message' => 'Temporary this service is down'], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode($response, true);
                else
                    echo json_encode($response, true);
            }
        } else {
            echo json_encode(['code' => 400, 'status' => 'failed', 'message' => $validator->messages()], true);
        }
    }

    public function loadActivitySettingsPreset(Request $request)
    {
        $postData = $request->all();
        $rules = [
            'manager_settings_id' => 'required|exists:manager_settings,manager_settings_id'
        ];

        foreach ($postData['instaUserId'] as $key => $val) {
            $rules['instaUserId.' . $key] = 'required|exists:instagram_users,ins_user_id';
        }

        $messages = [
            'manager_settings_id.required' => 'manager_settings_id field is required',
            'manager_settings_id.exists' => 'invalid manager_settings_id value',
        ];
        foreach ($postData['instaUserId'] as $key => $val) {
            $messages['instaUserId.' . $key . '.exists'] = 'The instaUserId  ' . $val . ' is invalid';
        }

        $validator = Validator::make($postData, $rules, $messages);


        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/load/activity/settings/preset';
            $data['instaUserId'] = json_encode($postData['instaUserId'], true);
            $data['manager_settings_id'] = $postData['manager_settings_id'];
            $data['token'] = Session::get('instaffic_user')['token'];

            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'code' => 400, 'message' => 'Temporary this service is down'], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode($response, true);
                else
                    echo json_encode($response, true);
            }
        } else {
            echo json_encode(['code' => 400, 'status' => 'failed', 'message' => $validator->messages()], true);
        }
    }

    public function resetActivitySettings(Request $request)
    {
        $postData = $request->all();
        $rules = [
            'instaUserId' => 'required|exists:instagram_users,ins_user_id'
        ];
        $validator = Validator::make($postData, $rules);

        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/reset/activity/settings';
            $data['instaUserId'] = $postData['instaUserId'];
            $data['token'] = Session::get('instaffic_user')['token'];

            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'code' => 400, 'message' => 'Temporary this service is down'], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode($response, true);
                else
                    echo json_encode($response, true);
            }
        } else {
            echo json_encode(['code' => 400, 'status' => 'failed', 'message' => $validator->messages()], true);
        }
    }


    public function settingsManager()
    {
        $errorMessage = '';
        $errorFlag = false;

        $api_url = $this->API_URL . '/get/instagram/accounts';
        $data['token'] = Session::get('instaffic_user')['token'];
        $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);


        $responseData['accountList'] = '';
        $responseData['presetList'] = '';

        if (empty($response)) {
            $errorFlag = true;
            $errorMessage = 'Temporary this service is down.';
        } else {
            if ($response['code'] === 200 && count($response['data']) > 0) {
                $responseData['accountList'] = $response['data'];
            } else {
                $errorFlag = true;
                $errorMessage = $response['message'];
            }
        }


        $api_url = $this->API_URL . '/get/activity/settings/preset';
        $data['token'] = Session::get('instaffic_user')['token'];

        $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
        if (empty($response)) {
            $errorFlag = true;
            $errorMessage = 'Temporary this service is down.';
        } else {
            if ($response['code'] === 200 && count($response['data']) > 0)
                $responseData['presetList'] = $response['data'];
            else
                echo json_encode($response, true);
        }


        if (!$errorFlag) {
//            return view("User::ProfilePromotion.settingManager")->with(['status'=>'success','user' => $user, 'filters_group' => $filters_group]);
            return view("User::PromotionManagement.Filter.settingManager")->with(['status'=>'success','data' => $responseData]);
        } else {
            return view("User::PromotionManagement.Filter.settingManager")->with(['status'=>'failed','data' => $responseData,'message'=>$errorMessage]);
        }

    }

}