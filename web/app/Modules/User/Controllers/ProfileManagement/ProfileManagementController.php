<?php
/**
 * Created by PhpStorm.
 * User: GLB-212
 * Date: 9/9/2016
 * Time: 4:29 PM
 */

namespace App\Modules\User\Controllers\ProfileManagement;


use Illuminate\Http\Request;
use Illuminate\curl\CurlRequestHandler;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Helpers;

class ProfileManagementController extends Controller
{
    protected $API_URL;

    public function __construct()
    {
        $this->API_URL = env('API_URL');
    }

    public function changePromotionStatus(Request $request)
    {
        $postData = $request->all();
        $rules['instaUserId'] = 'required|exists:instagram_users,ins_user_id';
        $rules['promotion_status'] = ['required', 'regex:/^(0|1)+$/'];
        $rules['method_name'] = ['required', 'regex:/^(TAGS|COMMENTS|CATCHING_PICTURE|DIRECT_MESSAGE)+$/'];

        $validator = Validator::make($postData, $rules);
        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/change/promotion/status';
            $data['instaUserId'] = $postData['instaUserId'];
            $data['promotion_status'] = $postData['promotion_status'];
            $data['method_name'] = $postData['method_name'];
            $data['token'] = Session::get('instaffic_user')['token'];
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'message' => 'Error in service'], true);
            } else {
                if ($response['code'] == 200) {
                    echo json_encode(['status' => 'success', 'message' => $response['message']], true);
                } else
                    echo json_encode(['status' => 'failed', 'message' => $response['message']], true);
            }
        } else {
            echo json_encode(['status' => 'failed', 'message' => $validator->messages()], true);
        }

    }


    //-------------------------WHO DIDN'T FOLLOW ME BACK-------------------------------------------------------//
    public function getManualFollow(Request $request, $insUserId = null)
    {
        if ($request->isMethod('post')) {
            $postData = $request->all();
            $rule = [
                'insUserId' => 'required|exists:instagram_users,ins_user_id',
                'pagination' => 'required'
            ];
            $validator = Validator::make($postData, $rule);
            if (!$validator->fails()) {

                $api_url = $this->API_URL . '/get/manual/followed/users';
                $data['insUserId'] = $postData['insUserId'];
                $data['pagination'] = json_encode($postData['pagination'], true);

                $data['token'] = Session::get('instaffic_user')['token'];
                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);


                if (empty($response)) {
                    echo json_encode(['status' => 'failed', 'message' => 'Error in service'], true);
                } else {
                    if ($response['code'] == 200) {

                        if ($response['status'] == 'success') {
                            $logCount = count($response['data']['logs']);
                            if ($logCount > 0) {
                                for ($i = 0; $i < $logCount; $i++) {
                                    $response['data']['logs'][$i]['followers_count'] = Helpers::number_format_short($response['data']['logs'][$i]['followers_count']);
                                }
                            }
                        }

                        echo json_encode(['status' => 'success', 'data' => $response['data'], 'message' => $response['message']], true);
                    } else
                        echo json_encode(['status' => 'failed', 'message' => $response['message']], true);
                }
            } else {
                echo json_encode(['status' => 'failed', 'message' => $validator->messages()], true);
            }
        } else {

            $isValidInstaUserId = true;
            $errorFlag = false;
            $errorMessage = false;
            if ($insUserId != null) {
                $postData['ins_user_id'] = $insUserId;
                $rule = ['ins_user_id' => 'numeric|exists:instagram_users,ins_user_id,added_by_user_id,' . Session::get('instaffic_user')['id']];
                $validator = Validator::make($postData, $rule);
                if ($validator->fails()) {
                    $isValidInstaUserId = false;
                    $errorFlag = true;
                    $errorMessage = 'Invalid URL data';
                }
            }

            if ($isValidInstaUserId) {
                $api_url = $this->API_URL . '/get/instagram/accounts';
                $data['token'] = Session::get('instaffic_user')['token'];
                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

                $responseData = array();
                $accountList = null;
                if (empty($response)) {
                    $errorFlag = true;
                    $errorMessage = $response['message'];
                } else {
                    if ($response['code'] == 200) {
                        $accountList = ($response['status'] == 'success') ? $response['data'] : null;
                    } else {
                        $errorFlag = true;
                        $errorMessage = $response['message'];
                    }
                }

                $logDetails = null;
                if (!$errorFlag && $accountList != null) {
                    $api_url = $this->API_URL . '/get/manual/followed/users';

                    $responseData['selectedUserId'] = ($insUserId != null) ? $insUserId : $accountList[0]['ins_user_id'];

                    $responseData['selectedUser'] = null;
                    for ($i = 0; $i < count($accountList); $i++) {
                        $responseData['selectedUser'] = $accountList[$i];
                        if ($insUserId == null) {
                            if ($accountList[$i]['status'] == 'A' && $accountList[$i]['is_logged_in'] == 'Y' && $accountList[$i]['is_user_disconnected'] == 'N') {
                                break;
                            }
                        } else {
                            if ($accountList[$i]['ins_user_id'] == $insUserId) {
                                break;
                            }
                        }
                    }

                    $responseData['selectedUserId'] = $responseData['selectedUser']['ins_user_id'];
                    $data1['insUserId'] = $responseData['selectedUser']['ins_user_id'];

                    $paginationData['limit'] = 20;
                    $paginationData['offset'] = 1;
                    $paginationData['next_max_id'] = null;
                    $data1['pagination'] = json_encode($paginationData, true);
                    $data1['token'] = Session::get('instaffic_user')['token'];


                    $response1 = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data1), true);
                    if (empty($response1)) {
                        $errorFlag = true;
                        $errorMessage = $response1['message'];
                    } else {
                        if ($response1['code'] == 200) {

                            if ($response1['status'] == 'success') {

                                $logCount = count($response1['data']['logs']);
                                if ($logCount > 0) {
                                    for ($i = 0; $i < $logCount; $i++) {
                                        $response1['data']['logs'][$i]['followers_count'] = Helpers::number_format_short($response1['data']['logs'][$i]['followers_count']);
                                    }
                                    $logDetails = $response1['data'];
                                }
                            }

                        } else {
                            $errorFlag = true;
                            $errorMessage = $response1['message'];
                        }
                    }
                }

                $responseData['accountList'] = $accountList;
                $responseData['logDetails'] = $logDetails;

                if (!$errorFlag) {
                    return view('User::ProfileManagement.manualFollow')->with(['status' => 'success', 'data' => $responseData]);
                } else {
                    return view('User::ProfileManagement.manualFollow')->with(['status' => 'failed', 'message' => $errorMessage]);
                }
            } else {
                return view('User::ProfileManagement.manualFollow')->with(['status' => 'failed', 'message' => $errorMessage]);
            }
        }
    }

    public function unfollowManualFollowedUser(Request $request)
    {

        $postData = $request->all();

        $rule = [
            'followedId' => 'required|exists:manual_follow_details,manual_follow_id'
        ];
        $validator = Validator::make($postData, $rule);
        if (!$validator->fails()) {

            $api_url = $this->API_URL . '/unfollow/manual/followed/users';
            $data['followedId'] = $postData['followedId'];
            $data['token'] = Session::get('instaffic_user')['token'];
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

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


    }


    //------------------------- TOP 20 ADMIRE ----------------------------------------------------------------//
    public function myTopAdmirers(Request $request, $insUserId = null)
    {

        $isValidInstaUserId = true;
        $errorFlag = false;
        $errorMessage = false;
        if ($insUserId != null) {
            $postData['ins_user_id'] = $insUserId;
            $rule = ['ins_user_id' => 'numeric|exists:instagram_users,ins_user_id,added_by_user_id,' . Session::get('instaffic_user')['id']];
            $validator = Validator::make($postData, $rule);
            if ($validator->fails()) {
                $isValidInstaUserId = false;
                $errorFlag = true;
                $errorMessage = 'Invalid URL data';
            }
        }

        if ($isValidInstaUserId) {
            $api_url = $this->API_URL . '/get/instagram/accounts';
            $data['token'] = Session::get('instaffic_user')['token'];
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

            $responseData = array();
            $accountList = null;
            if (empty($response)) {
                $errorFlag = true;
                $errorMessage = $response['message'];
            } else {
                if ($response['code'] == 200) {
                    $accountList = ($response['status'] == 'success') ? $response['data'] : null;

                } else {
                    $errorFlag = true;
                    $errorMessage = $response['message'];
                }
            }

            $admireDetails = null;
            if (!$errorFlag && $accountList != null) {
                $api_url = $this->API_URL . '/get/top/admire';

                $responseData['selectedUserId'] = ($insUserId != null) ? $insUserId : $accountList[0]['ins_user_id'];

                $responseData['selectedUser'] = null;
                for ($i = 0; $i < count($accountList); $i++) {
                    $responseData['selectedUser'] = $accountList[$i];
                    if ($insUserId == null) {
                        if ($accountList[$i]['status'] == 'A' && $accountList[$i]['is_logged_in'] == 'Y' && $accountList[$i]['is_user_disconnected'] == 'N') {
                            break;
                        }
                    } else {
                        if ($accountList[$i]['ins_user_id'] == $insUserId) {
                            break;
                        }
                    }
                }

                $responseData['selectedUserId'] = $responseData['selectedUser']['ins_user_id'];
                $data1['instaUserId'] = $responseData['selectedUser']['ins_user_id'];
                $data1['token'] = Session::get('instaffic_user')['token'];

                $response1 = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data1), true);

                if (empty($response1)) {
                    $errorFlag = true;
                    $errorMessage = $response1['message'];
                } else {
                    if ($response1['code'] == 200) {
                        if ($response1['status'] == 'success') {

                            $admireCount = count($response1['data']);
                            if ($admireCount > 0) {
                                for ($i = 0; $i < $admireCount; $i++) {
                                    $response1['data'][$i]['post_count'] = Helpers::number_format_short($response1['data'][$i]['post_count']);
                                    $response1['data'][$i]['followings_count'] = Helpers::number_format_short($response1['data'][$i]['followings_count']);
                                    $response1['data'][$i]['followers_count'] = Helpers::number_format_short($response1['data'][$i]['followers_count']);
                                }
                            }
                            $admireDetails = $response1['data'];
                        }
                    } else {
                        $errorFlag = true;
                        $errorMessage = $response1['message'];
                    }
                }
            }

            $responseData['accountList'] = $accountList;
            $responseData['admireDetails'] = $admireDetails;

            $tagDataSavedMsg = null;
            if (!$errorFlag) {
                return view('User::ProfileManagement.myTopAdmirers')->with(['status' => 'success', 'data' => $responseData]);
            } else {
                return view('User::ProfileManagement.myTopAdmirers')->with(['status' => 'failed', 'message' => $errorMessage]);
            }

        } else {
            return view('User::ProfileManagement.myTopAdmirers')->with(['status' => 'failed', 'message' => $errorMessage]);
        }
    }


    //-------------------------ALERT ABOUT FAVORITE USERS -----------------------------------------------------//
    public function addFavoriteUser(Request $request)
    {
        if ($request->isMethod('post')) {

            $postData = $request->all();

            $rule = [
//                "insUserId" => 'required',
                "instagramId" => 'required',
                "profile_pic_url" => 'required',
                "for_user_name" => 'required'
            ];

            $validator = Validator::make($postData, $rule);
            if (!$validator->fails()) {

                $api_url = $this->API_URL . '/add/favorite/user';

//                $data['insUserId'] = json_encode($postData['insUserId'],true);
                $data['instagramId'] = $postData['instagramId'];
                $data['profile_pic_url'] = $postData['profile_pic_url'];
                $data['for_user_name'] = $postData['for_user_name'];
                $data["token"] = Session::get('instaffic_user')['token'];

                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

                if (empty($response)) {
                    echo json_encode(['status' => 'failed', 'message' => ['Server not started']], true);
                } else {
                    if ($response['code'] === 200) {
                        if ($response['status'] == 'success') {
                            echo json_encode(['code' => 200, 'status' => 'success', 'message' => $response['message']], true);
                        } else {
                            echo json_encode(['code' => 200, 'status' => 'failed', 'message' => $response['message']], true);
                        }
                    } else
                        echo json_encode(['code' => 400, 'status' => 'failed', 'message' => $response['message']], true);
                }

            } else {
                echo json_encode(['code' => 400, 'status' => 'failed', 'message' => $validator->messages()], true);
            }
        }
    }

    public function getAlertAboutFavoriteUsers(Request $request, $insUserId = null)
    {
        if ($request->isMethod('post')) {
            $postData = $request->all();

            $rule = [
                'insUserId' => 'required|exists:instagram_users,ins_user_id',
                'pagination' => 'required'
            ];

            $validator = Validator::make($postData, $rule);
            if (!$validator->fails()) {
                $api_url = $this->API_URL . '/get/favorite/users';
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
        } else {

            $isValidInstaUserId = true;
            $errorFlag = false;
            $errorMessage = false;
            if ($insUserId != null) {
                $postData['ins_user_id'] = $insUserId;
                $rule = ['ins_user_id' => 'numeric|exists:instagram_users,ins_user_id,added_by_user_id,' . Session::get('instaffic_user')['id']];
                $validator = Validator::make($postData, $rule);
                if ($validator->fails()) {
                    $isValidInstaUserId = false;
                    $errorFlag = true;
                    $errorMessage = 'Invalid URL data';
                }
            }

            if ($isValidInstaUserId) {
                $api_url = $this->API_URL . '/get/instagram/accounts';
                $data['token'] = Session::get('instaffic_user')['token'];
                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

                $responseData = array();
                $accountList = null;
                if (empty($response)) {
                    $errorFlag = true;
                    $errorMessage = $response['message'];
                } else {
                    if ($response['code'] == 200) {
                        $accountList = ($response['status'] == 'success') ? $response['data'] : null;

                    } else {
                        $errorFlag = true;
                        $errorMessage = $response['message'];
                    }
                }


                $logDetails = null;
                if (!$errorFlag && $accountList != null) {
                    $api_url = $this->API_URL . '/get/favorite/users';
                    $responseData['selectedUserId'] = ($insUserId != null) ? $insUserId : $accountList[0]['ins_user_id'];

                    $responseData['selectedUser'] = null;
                    for ($i = 0; $i < count($accountList); $i++) {
                        $responseData['selectedUser'] = $accountList[$i];
                        if ($insUserId == null) {
                            if ($accountList[$i]['status'] == 'A' && $accountList[$i]['is_logged_in'] == 'Y' && $accountList[$i]['is_user_disconnected'] == 'N') {
                                break;
                            }
                        } else {
                            if ($accountList[$i]['ins_user_id'] == $insUserId) {
                                break;
                            }
                        }
                    }

                    $responseData['selectedUserId'] = $responseData['selectedUser']['ins_user_id'];

                    $data1['insUserId'] = $responseData['selectedUser']['ins_user_id'];
                    $paginationData['limit'] = 12;
                    $paginationData['next_max_id'] = null;
                    $data1['pagination'] = json_encode($paginationData, true);
                    $data1['token'] = Session::get('instaffic_user')['token'];

                    $response1 = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data1), true);
                    if (empty($response1)) {
                        $errorFlag = true;
                        $errorMessage = $response1['message'];
                    } else {
                        if ($response1['code'] == 200) {
                            $logDetails = ($response1['status'] == 'success') ? $response1['data'] : null;
                        } else {
                            $errorFlag = true;
                            $errorMessage = $response1['message'];
                        }
                    }
                }

                $responseData['accountList'] = $accountList;
                $responseData['logDetails'] = $logDetails;
                if (!$errorFlag) {
                    return view('User::ProfileManagement.favoriteUser')->with(['status' => 'success', 'data' => $responseData]);
                } else {
                    return view('User::ProfileManagement.favoriteUser')->with(['status' => 'failed', 'message' => $errorMessage]);
                }
            } else {
                return view('User::ProfileManagement.favoriteUser')->with(['status' => 'failed', 'message' => $errorMessage]);
            }
        }
    }

    public function deleteFavoriteUser(Request $request)
    {
        $postData = $request->all();

        $rules = [
            'favoriteUserId' => 'required|exists:favorite_profiles,favorite_profile_id'
        ];
        $validator = Validator::make($postData, $rules);

        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/delete/favorite/user';
//            $api_url = $this->API_URL . '/deleteFavorite';
            $data['token'] = Session::get('instaffic_user')['token'];
            $data['favoriteUserId'] = $postData['favoriteUserId'];
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'code' => 400, 'message' => ['Server not started']], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode(['status' => 'success', 'code' => 200, 'message' => $response['message']], true);
                else
                    echo json_encode(['status' => 'failed', 'code' => 400, 'message' => [$response['message']]], true);
            }
        } else {
            echo json_encode(['status' => 'failed', 'code' => 400, 'message' => $validator->messages()], true);
        }
    }

    public function alertGetLatestMedia(Request $request)
    {

        $postData = $request->all();
        $rule = [
            'favoriteUserId' => 'required|exists:favorite_profiles,favorite_profile_id',
            'pagination' => 'required'
        ];
        $validator = Validator::make($postData, $rule);
        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/get/latest/media/of/favorite/users';
            $data['favoriteUserId'] = $postData['favoriteUserId'];
            $data['pagination'] = json_encode($postData['pagination'], true);
            $data['token'] = Session::get('instaffic_user')['token'];
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);


            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'message' => 'Error in service'], true);
            } else {
                if ($response['code'] == 200) {

                    $mediaCount = count($response['data']['media']);
                    if ($mediaCount > 0) {
                        for ($i = 0; $i < $mediaCount; $i++) {
                            $response['data']['media'][$i]['media_comments_count'] = Helpers::number_format_short($response['data']['media'][$i]['media_comments_count']);
                            $response['data']['media'][$i]['media_likes_count'] = Helpers::number_format_short($response['data']['media'][$i]['media_likes_count']);
                        }
                    }

                    echo json_encode(['status' => $response['status'], 'code' => 200, 'data' => $response['data'], 'message' => $response['message']], true);
                } else
                    echo json_encode(['status' => 'failed', 'code' => 400, 'message' => $response['message']], true);
            }
        } else {
            echo json_encode(['status' => 'failed', 'code' => 400, 'message' => $validator->messages()], true);
        }
    }

    public function alertMediaViewStatus(Request $request)
    {
        $postData = $request->all();

        $rules = [
            'favoriteUserId' => 'required|exists:favorite_profiles,favorite_profile_id'
        ];
        $validator = Validator::make($postData, $rules);

        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/update/media/view/status/of/favorite/users';
            $data['token'] = Session::get('instaffic_user')['token'];
            $data['favoriteUserId'] = $postData['favoriteUserId'];
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'code' => 400, 'message' => ['Server not started']], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode(['status' => 'success', 'code' => 200, 'message' => $response['message']], true);
                else
                    echo json_encode(['status' => 'failed', 'code' => 400, 'message' => [$response['message']]], true);
            }
        } else {
            echo json_encode(['status' => 'failed', 'code' => 400, 'message' => $validator->messages()], true);
        }
    }

    public function alertMediaLike(Request $request)
    {
        $postData = $request->all();

        $rules = [
            'instaUserId' => 'required|exists:instagram_users,ins_user_id',
            'favoriteUserMediaId' => 'required|exists:favorite_profiles_media,favorite_profile_media_id'
        ];
        $validator = Validator::make($postData, $rules);

        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/like/media/of/favorite/users';
            $data['token'] = Session::get('instaffic_user')['token'];
            $data['instaUserId'] = $postData['instaUserId'];
            $data['favoriteUserMediaId'] = $postData['favoriteUserMediaId'];
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'code' => 400, 'message' => ['Server not started']], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode(['status' => 'success', 'code' => 200, 'message' => $response['message']], true);
                else
                    echo json_encode(['status' => 'failed', 'code' => 400, 'message' => $response['message']], true);
            }
        } else {
            echo json_encode(['status' => 'failed', 'code' => 400, 'message' => $validator->messages()], true);
        }
    }

    public function alertMediaUnLike(Request $request)
    {
        $postData = $request->all();

        $rules = [
            'instaUserId' => 'required|exists:instagram_users,ins_user_id',
            'favoriteUserMediaId' => 'required|exists:favorite_profiles_media,favorite_profile_media_id'
        ];
        $validator = Validator::make($postData, $rules);

        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/unlike/media/of/favorite/users';
            $data['token'] = Session::get('instaffic_user')['token'];
            $data['instaUserId'] = $postData['instaUserId'];
            $data['favoriteUserMediaId'] = $postData['favoriteUserMediaId'];
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'code' => 400, 'message' => ['Server not started']], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode(['status' => 'success', 'code' => 200, 'message' => $response['message']], true);
                else
                    echo json_encode(['status' => 'failed', 'code' => 400, 'message' => $response['message']], true);
            }
        } else {
            echo json_encode(['status' => 'failed', 'code' => 400, 'message' => $validator->messages()], true);
        }
    }

    public function alertMediaComment(Request $request)
    {
        $postData = $request->all();

        $rules = [
            'instaUserId' => 'required|exists:instagram_users,ins_user_id',
            'favoriteUserMediaId' => 'required|exists:favorite_profiles_media,favorite_profile_media_id',
            'commentText' => 'required'
        ];
        $validator = Validator::make($postData, $rules);

        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/comment/media/of/favorite/users';
            $data['token'] = Session::get('instaffic_user')['token'];
            $data['instaUserId'] = $postData['instaUserId'];
            $data['favoriteUserMediaId'] = $postData['favoriteUserMediaId'];
            $data['commentText'] = $postData['commentText'];
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'code' => 400, 'message' => ['Server not started']], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode(['status' => 'success', 'code' => 200, 'message' => $response['message']], true);
                else
                    echo json_encode(['status' => 'failed', 'code' => 400, 'message' => $response['message']], true);
            }
        } else {
            echo json_encode(['status' => 'failed', 'code' => 400, 'message' => $validator->messages()], true);
        }
    }


    //------------------------- UPLOADING POST BY TIMER---------------------------------------------------//
    public function getNearByLocation(Request $request)
    {
        $postData = $request->all();
        $rules['instaUserId'] = 'required|exists:instagram_users,ins_user_id';
        $rules['lat'] = 'required';
        $rules['lng'] = 'required';

        $validator = Validator::make($postData, $rules);
        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/get/nearby/search/location';
            $data['token'] = Session::get('instaffic_user')['token'];
            $data['instaUserId'] = intval(trim($postData['instaUserId']));
            $data['latitude'] = $postData['lat'];
            $data['longitude'] = $postData['lng'];

            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'code' => 400, 'message' => [['Server not started']]], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode(['status' => 'success', 'code' => $response['code'], 'data' => $response['data']], true);
                else
                    echo json_encode(['status' => 'failed', 'code' => $response['code'], 'message' => [$response['message']]], true);
            }
        } else {
            echo json_encode(['status' => 'failed', 'code' => 400, 'message' => $validator->messages()], true);
        }
    }

    public function uploadPost(Request $request, $insUserId = null)
    {
        if ($request->isMethod('post')) {
            $postData = $request->all();
            $data = array();

            $rules['instaUserId'] = 'required|exists:instagram_users,ins_user_id';
            $rules['serviceType'] = ['required', 'regex:/^(SCHEDULE|POST)+$/'];

            if (!isset($postData['caption'])) {
                $rules['caption'] = 'required';
            }
            if (!isset($postData['location'])) {
                $rules['location'] = 'required';
            }
            if (!isset($postData['hashtags'])) {
                $rules['hashtags'] = 'required';
            }
            if (!isset($postData['usernames'])) {
                $rules['usernames'] = 'required';
            }

            $rules['postType'] = ['required', 'regex:/^(I|V)+$/'];

            $validator = Validator::make($postData, $rules);
            if (!$validator->fails()) {
                if ($postData['serviceType'] == 'SCHEDULE') {
                    $rules['scheduleTime'] = 'required';
                    $rules['user_timezone'] = 'required';
                }

                if ($postData['postType'] == 'I') {
                    $rules['base64Image'] = ['required', 'regex:/^data:(image\/(jpg|jpeg|png));base64,(.*?)+/'];
                } else if ($postData['postType'] == 'V') {
                    //TODO implement for video post
                }

                $validator1 = Validator::make($postData, $rules);
                if (!$validator1->fails()) {
                    $api_url = null;
                    $data['token'] = Session::get('instaffic_user')['token'];
                    $data['instaUserId'] = $postData['instaUserId'];

                    if ($postData['postType'] == 'I') {

                        if ($postData['serviceType'] == 'SCHEDULE') {
                            $api_url = $this->API_URL . '/schedule/photo/now';
                            $data['scheduleTime'] = $postData['scheduleTime'];
                            $data['user_timezone'] = $postData['user_timezone'];
                        } else {
                            $api_url = $this->API_URL . '/upload/photo/now';
                        }

                        $data['base64Image'] = $postData['base64Image'];
                    } else if ($postData['postType'] == 'V') {

                        //TODO implement for video post
                    }

                    $data['caption'] = $postData['caption'];
                    $data['location'] = $postData['location'];
                    $data['hashtags'] = $postData['hashtags'];

                    try {
                        $usernames = '';
                        $usernamesArray = json_decode($postData['usernames']);
                        $userCount = count($usernamesArray);
                        for ($i = 0; $i < $userCount; $i++) {
                            $usernames .= $usernamesArray[$i]->username;
                            if ($i != ($userCount - 1)) {
                                $usernames .= ',';
                            }
                        }
                        $data['usernames'] = $usernames;

                        $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

                        if (empty($response)) {
                            echo json_encode(['status' => 'failed', 'code' => 400, 'message' => [['Server not started']]], true);
                        } else {
                            if ($response['code'] === 200)
                                echo json_encode(['status' => 'success', 'code' => $response['code'], 'data' => isset($response['data']) ? $response['data'] : null, 'message' => [$response['message']]], true);
                            else
                                echo json_encode(['status' => 'failed', 'code' => $response['code'], 'message' => [$response['message']]], true);
                        }

                    } catch (\Exception $e) {
                        echo json_encode(['status' => 'failed', 'code' => 400, 'message' => ['Error in username data']], true);
                    }

                } else {
                    echo json_encode(['status' => 'failed', 'code' => 400, 'message' => $validator1->messages()], true);
                }
            } else {
                echo json_encode(['status' => 'failed', 'code' => 400, 'message' => $validator->messages()], true);
            }

        } else {
            $isValidInstaUserId = true;
            $errorFlag = false;
            $errorMessage = false;
            if ($insUserId != null) {
                $postData['ins_user_id'] = $insUserId;
                $rule = ['ins_user_id' => 'numeric|exists:instagram_users,ins_user_id,added_by_user_id,' . Session::get('instaffic_user')['id']];
                $validator = Validator::make($postData, $rule);
                if ($validator->fails()) {
                    $isValidInstaUserId = false;
                    $errorFlag = true;
                    $errorMessage = 'Invalid URL data';
                }
            }

            if ($isValidInstaUserId) {
                $api_url = $this->API_URL . '/get/instagram/accounts';
                $data['token'] = Session::get('instaffic_user')['token'];
                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

                $responseData = array();
                $accountList = null;
                if (empty($response)) {
                    $errorFlag = true;
                    $errorMessage = $response['message'];
                } else {
                    if ($response['code'] == 200) {
                        $accountList = ($response['status'] == 'success') ? $response['data'] : null;

                    } else {
                        $errorFlag = true;
                        $errorMessage = $response['message'];
                    }
                }

                if (!$errorFlag && $accountList != null) {
                    $responseData['selectedUserDetails'] = null;
                    for ($i = 0; $i < count($accountList); $i++) {
                        $responseData['selectedUserDetails'] = $accountList[$i];
                        if ($insUserId == null) {
                            if ($accountList[$i]['status'] == 'A' && $accountList[$i]['is_logged_in'] == 'Y' && $accountList[$i]['is_user_disconnected'] == 'N') {
                                break;
                            }
                        } else {
                            if ($accountList[$i]['ins_user_id'] == $insUserId) {
                                break;
                            }
                        }
                    }
                    $responseData['selectedUserId'] = $responseData['selectedUserDetails']['ins_user_id'];
                }

                $responseData['accountList'] = $accountList;
                if (!$errorFlag) {
                    return view('User::ProfileManagement.uploadPost')->with(['status' => 'success', 'data' => $responseData]);
                } else {
                    return view('User::ProfileManagement.uploadPost')->with(['status' => 'failed', 'message' => $errorMessage]);
                }
            } else {
                return view('User::ProfileManagement.uploadPost')->with(['status' => 'failed', 'message' => $errorMessage]);
            }
        }
    }


    //------------------------- SEND DIRECT MESSAGES ------------------------------------------------------//
    public function directMessages(Request $request, $insUserId = null)
    {
        if ($request->isMethod('post')) {
            $postData = $request->all();
            $rules = [
                'instaUserId' => 'required|exists:instagram_users,ins_user_id',
                'targetGroupId' => 'required|exists:target_groups,target_group_id',
                'pictureMessage' => 'required',
                'textMessage' => 'required',
            ];

            $messages = [
                'instaUserId.required' => 'instaUserId field value is required',
                'instaUserId.exists' => 'Invalid instsgram user id',
                'targetGroupId.required' => 'targetGroupId field value is required',
                'targetGroupId.exists' => 'Invalid targetGroupId',
                'pictureMessage.required' => 'pictureMessage field value is required',
                'textMessage.required' => 'textMessage field value is required',
            ];

            $validator = Validator::make($postData, $rules, $messages);
            if (!$validator->fails()) {

                $errorFlag = false;
                $errorMessage = null;
                $base64Image = null;
                $ImageMessageData = null;

                if ($request->hasFile('pictureMessage')) {
                    $imageFileData = Input::file('pictureMessage');
                    if ($imageFileData->isValid()) {
                        $path = $imageFileData->getRealPath();
                        $extension = $imageFileData->getClientOriginalExtension();

                        if (in_array($extension, array("jpg", "jpeg", "png"))) {
                            $base64Image = 'data:image/' . $extension . ';base64,' . base64_encode(file_get_contents($path));
                        } else {
                            $errorFlag = true;
                            $errorMessage = 'Image type must be jpg or jpeg or png only';
                        }
                    } else {
                        $errorFlag = true;
                        $errorMessage = 'Error in image data.';
                    }
                }

                if (!$errorFlag) {

                    $api_url = $this->API_URL . '/groupMessage';
                    $data['token'] = Session::get('instaffic_user')['token'];
                    $data['account'] = $postData['instaUserId'];
                    $data['target_group_id'] = $postData['targetGroupId'];
                    $data['groupText'] = $postData['textMessage'];
                    $data['base64image'] = $base64Image;

                    $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

                    if (empty($response)) {
                        $sessionMessageData["message"] = "Server not started";
                        $sessionMessageData["status"] = "failed";
                        Session::put('directMessageDataSavedMsg', $sessionMessageData);
                        return redirect('/direct/messages/' . $postData['instaUserId']);
                    } else {
                        if ($response['code'] === 200) {
                            $sessionMessageData["message"] = $response['message'];
                            $sessionMessageData["status"] = "success";
                            Session::put('directMessageDataSavedMsg', $sessionMessageData);
                            return redirect('/direct/messages/' . $postData['instaUserId']);

                        } else {
                            $sessionMessageData["message"] = $response['message'];
                            $sessionMessageData["status"] = "failed'";

                            Session::put('directMessageDataSavedMsg', $sessionMessageData);
                            return redirect('/direct/messages/' . $postData['instaUserId']);
                        }
                    }

                } else {
                    $sessionMessageData["message"] = $errorMessage;
                    $sessionMessageData["status"] = "failed";
                    Session::put('directMessageDataSavedMsg', $sessionMessageData);
                    return redirect('/direct/messages/' . $postData['instaUserId']);
                }
            } else {
                return Redirect::back()->withErrors($validator->messages())->withInput();
            }
        } else {
            $isValidInstaUserId = true;
            $errorFlag = false;
            $errorMessage = false;
            if ($insUserId != null) {
                $postData['ins_user_id'] = $insUserId;
                $rule = ['ins_user_id' => 'numeric|exists:instagram_users,ins_user_id,added_by_user_id,' . Session::get('instaffic_user')['id']];
                $validator = Validator::make($postData, $rule);
                if ($validator->fails()) {
                    $isValidInstaUserId = false;
                    $errorFlag = true;
                    $errorMessage = 'Invalid URL data';
                }
            }

            if ($isValidInstaUserId) {

                $api_url = $this->API_URL . '/get/instagram/accounts';
                $data['token'] = Session::get('instaffic_user')['token'];
                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

                $responseData = array();
                $accountList = null;
                if (empty($response)) {
                    $errorFlag = true;
                    $errorMessage = $response['message'];
                } else {
                    if ($response['code'] == 200) {
                        $accountList = ($response['status'] == 'success') ? $response['data'] : null;

                    } else {
                        $errorFlag = true;
                        $errorMessage = $response['message'];
                    }
                }


                $targetGroupDetails = null;
                if (!$errorFlag && $accountList != null) {
                    $responseData['selectedUserDetails'] = null;
                    for ($i = 0; $i < count($accountList); $i++) {
                        $responseData['selectedUserDetails'] = $accountList[$i];
                        if ($insUserId == null) {
                            if ($accountList[$i]['status'] == 'A' && $accountList[$i]['is_logged_in'] == 'Y' && $accountList[$i]['is_user_disconnected'] == 'N') {
                                break;
                            }
                        } else {
                            if ($accountList[$i]['ins_user_id'] == $insUserId) {
                                break;
                            }
                        }
                    }
                    $responseData['selectedUserId'] = $responseData['selectedUserDetails']['ins_user_id'];


                    $api_url = $this->API_URL . '/getTargetGroupDetails';
                    $data1['for_insta_id'] = $responseData['selectedUserDetails']['ins_user_id'];
                    $data1['token'] = Session::get('instaffic_user')['token'];
                    $response1 = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data1), true);

                    if (empty($response1)) {
                        $errorFlag = true;
                        $errorMessage = $response1['message'];
                    } else {
                        if ($response1['code'] == 200) {

                            if ($response1['status'] == 'success') {
                                $targetGroupDetails = $response1['data'];
                            }

                        } else {
                            $errorFlag = true;
                            $errorMessage = $response1['message'];
                        }
                    }
                }

                $responseData['accountList'] = $accountList;
                $responseData['targetGroupDetails'] = $targetGroupDetails;
                $directMessageDataSavedMsg = null;

                if (!$errorFlag) {
                    if (Session::has('directMessageDataSavedMsg')) {
                        $directMessageDataSavedMsg = Session::get('directMessageDataSavedMsg');
                        Session::forget('directMessageDataSavedMsg');
                    }
                    return view('User::ProfileManagement.directMessages')->with(['status' => 'success', 'data' => $responseData, 'directMessageDataSavedMsg' => $directMessageDataSavedMsg]);
                } else {
                    return view('User::ProfileManagement.directMessages')->with(['status' => 'failed', 'message' => $errorMessage]);
                }
            } else {
                return view('User::ProfileManagement.directMessages')->with(['status' => 'failed', 'message' => $errorMessage]);
            }
        }
    }


    //------------------------- CATCHING PICTURE  --------------------------------------------------------//
    public function catchingPictures(Request $request, $insUserId = null)
    {
        if ($request->isMethod('post')) {
            $postData = $request->all();

            $rules = [
                'instaUserId' => 'required|exists:instagram_users,ins_user_id',
                'uploadPostCountPerDay' => 'required|digits_between:1,16',
                'delayBetweenPost' => 'required|numeric',
            ];

            $messages = [
                'instaUserId.required' => 'Invalid instsgram user id',
                'instaUserId.exists' => 'Invalid instsgram user id',
            ];
            $validator = Validator::make($postData, $rules, $messages);


            if (!$validator->fails()) {
                $api_url = $this->API_URL . '/add/catching/pictures';
                $data['token'] = Session::get('instaffic_user')['token'];
                $data['instaUserId'] = $postData['instaUserId'];
                $data['post_count_per_day'] = $postData['uploadPostCountPerDay'];
                $data['delay_between_post'] = $postData['delayBetweenPost'];

//                $data['tag'] = '';
//                if (isset($postData['hashTagData']) && !empty(trim($postData['hashTagData']))) {
//
//                    $data['tag'] = '[' . $postData['hashTagData'] . ']';
//                    $tags = explode(',', $postData['hashTagData']);
//                    $tagsString = "[";
//                    for ($i = 0; $i < count($tags); $i++) {
//                        $tagsString .= '"' . $tags[$i] . '"';
//                        if (($i + 1) != count($tags)) {
//                            $tagsString .= ",";
//                        }
//                    }
//                    $tagsString .= "]";
//                    $data['tag'] = $tagsString;
//                }
//
                $data['tag'] = '';
                if (isset($postData['hashTagData']) && !empty(trim($postData['hashTagData']))) {
                    $data['tag'] = $postData['hashTagData'];
                }

                $data['user'] = '';
                if (isset($postData['usernameData']) && !empty(json_decode(trim($postData['usernameData'])))) {
                    $data['user'] = $postData['usernameData'];
                }

                $data['location'] = '';

                if (isset($postData['locationData']) && !empty(json_decode(trim($postData['locationData'])))) {
                    $data['location'] = $postData['locationData'];
                }


//                dd($postData,$data,CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data));
                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

                if (empty($response)) {
                    $sessionMessageData["message"] = "Server not started";
                    $sessionMessageData["status"] = "failed";
                    Session::put('catchingPicturesDataSavedMsg', $sessionMessageData);
                    return redirect('/catching/pictures/' . $postData['instaUserId']);
                } else {
                    if ($response['code'] === 200) {
                        $sessionMessageData["message"] = "Catching Pictures data saved successfully";
                        $sessionMessageData["status"] = "success";

                        Session::put('catchingPicturesDataSavedMsg', $sessionMessageData);
                        return redirect('/catching/pictures/' . $postData['instaUserId']);

                    } else {
                        $sessionMessageData["message"] = $response['message'];
                        $sessionMessageData["status"] = "failed'";

                        Session::put('catchingPicturesDataSavedMsg', $sessionMessageData);
                        return redirect('/catching/pictures/' . $postData['instaUserId']);
                    }
                }

            } else {

                return Redirect::back()->withErrors($validator->messages())->withInput();
            }


        } else {
            $isValidInstaUserId = true;
            $errorFlag = false;
            $errorMessage = false;
            if ($insUserId != null) {
                $postData['ins_user_id'] = $insUserId;
                $rule = ['ins_user_id' => 'numeric|exists:instagram_users,ins_user_id,added_by_user_id,' . Session::get('instaffic_user')['id']];
                $validator = Validator::make($postData, $rule);
                if ($validator->fails()) {
                    $isValidInstaUserId = false;
                    $errorFlag = true;
                    $errorMessage = 'Invalid URL data';
                }
            }

            if ($isValidInstaUserId) {

                $api_url = $this->API_URL . '/get/instagram/accounts';
                $data['token'] = Session::get('instaffic_user')['token'];
                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
//dd($response);
                $responseData = array();
                $accountList = null;
                if (empty($response)) {
                    $errorFlag = true;
                    $errorMessage = $response['message'];
                } else {
                    if ($response['code'] == 200) {
                        $accountList = ($response['status'] == 'success') ? $response['data'] : null;

                    } else {
                        $errorFlag = true;
                        $errorMessage = $response['message'];
                    }
                }


                $catchingPicturesDetails = null;
                if (!$errorFlag && $accountList != null) {
                    $responseData['selectedUserDetails'] = null;
                    for ($i = 0; $i < count($accountList); $i++) {
                        $responseData['selectedUserDetails'] = $accountList[$i];
                        if ($insUserId == null) {
                            if ($accountList[$i]['status'] == 'A' && $accountList[$i]['is_logged_in'] == 'Y' && $accountList[$i]['is_user_disconnected'] == 'N') {
                                break;
                            }
                        } else {
                            if ($accountList[$i]['ins_user_id'] == $insUserId) {
                                break;
                            }
                        }
                    }
                    $responseData['selectedUserId'] = $responseData['selectedUserDetails']['ins_user_id'];

                    $api_url = $this->API_URL . '/get/catching/pictures';
                    $data1['instaUserId'] = $responseData['selectedUserDetails']['ins_user_id'];
                    $data1['token'] = Session::get('instaffic_user')['token'];
                    $response1 = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data1), true);

                    if (empty($response1)) {
                        $errorFlag = true;
                        $errorMessage = $response1['message'];
                    } else {
                        if ($response1['code'] == 200) {
                            if ($response1['status'] == 'success') {
                                $catchingPicturesDetails = $response1['data'];
                            }
                        } else {
                            $errorFlag = true;
                            $errorMessage = $response1['message'];
                        }
                    }
                }

                $responseData['accountList'] = $accountList;
                $responseData['catchingPicturesDetails'] = $catchingPicturesDetails;
                $catchingPicturesDataSavedMsg = null;
                if (!$errorFlag) {
                    if (Session::has('catchingPicturesDataSavedMsg')) {
                        $catchingPicturesDataSavedMsg = Session::get('catchingPicturesDataSavedMsg');
                        Session::forget('catchingPicturesDataSavedMsg');
                    }
                    return view('User::ProfileManagement.catchingPictures')->with(['status' => 'success', 'data' => $responseData, 'catchingPicturesDataSavedMsg' => $catchingPicturesDataSavedMsg]);
                } else {
                    return view('User::ProfileManagement.catchingPictures')->with(['status' => 'failed', 'message' => $errorMessage]);
                }
            } else {
                return view('User::ProfileManagement.catchingPictures')->with(['status' => 'failed', 'message' => $errorMessage]);
            }
        }
    }


    //------------------------- SEND AUTOMATIC COMMENTS -----------------------------------------------------//
    public function automaticComments(Request $request, $insUserId = null)
    {
        if ($request->isMethod('post')) {

            $postData = $request->all();

            $rules = [
                'instaUserId' => 'required|exists:instagram_users,ins_user_id',
//                'commentsTextArea' => 'required',
                'commentsData' => 'required',
                'hashTagData' => 'required'
            ];

            $messages = [
                'instaUserId.required' => 'Invalid instsgram user id',
                'instaUserId.exists' => 'Invalid instsgram user id',
//                'commentsTextArea.required' => 'Atleast one comment is required',
                'commentsData.required' => 'Atleast one comment is required',
                'hashTagData.required' => 'Atleast one hash tag is required'
            ];
            $validator = Validator::make($postData, $rules, $messages);

            if (!$validator->fails()) {
                $api_url = $this->API_URL . '/add/automatic/comments';
                $data['token'] = Session::get('instaffic_user')['token'];
                $data['instaUserId'] = $postData['instaUserId'];

                $data['commentTexts'] = $postData['commentsData'];
                $data['hashTags'] = $postData['hashTagData'];

                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

                if (empty($response)) {

                    $sessionMessageData["message"] = "Server not started";
                    $sessionMessageData["status"] = "failed";
                    Session::put('commentDataSavedMsg', $sessionMessageData);
                    return redirect('/automatic/comments/' . $postData['instaUserId']);
                } else {
                    if ($response['code'] === 200) {
                        $sessionMessageData["message"] = "AutoComments data saved successfully";
                        $sessionMessageData["status"] = "success";

                        Session::put('commentDataSavedMsg', $sessionMessageData);
                        return redirect('/automatic/comments/' . $postData['instaUserId']);

                    } else {
                        $sessionMessageData["message"] = $response['message'];
                        $sessionMessageData["status"] = "failed'";

                        Session::put('commentDataSavedMsg', $sessionMessageData);
                        return redirect('/automatic/comments/' . $postData['instaUserId']);
                    }
                }

            } else {

                return Redirect::back()->withErrors($validator->messages())->withInput();
            }


        } else {
            $isValidInstaUserId = true;
            $errorFlag = false;
            $errorMessage = false;
            if ($insUserId != null) {
                $postData['ins_user_id'] = $insUserId;
                $rule = ['ins_user_id' => 'numeric|exists:instagram_users,ins_user_id,added_by_user_id,' . Session::get('instaffic_user')['id']];
                $validator = Validator::make($postData, $rule);
                if ($validator->fails()) {
                    $isValidInstaUserId = false;
                    $errorFlag = true;
                    $errorMessage = 'Invalid URL data';
                }
            }

            if ($isValidInstaUserId) {

                $api_url = $this->API_URL . '/get/instagram/accounts';
                $data['token'] = Session::get('instaffic_user')['token'];
                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
//dd($response);
                $responseData = array();
                $accountList = null;
                if (empty($response)) {
                    $errorFlag = true;
                    $errorMessage = $response['message'];
                } else {
                    if ($response['code'] == 200) {
                        $accountList = ($response['status'] == 'success') ? $response['data'] : null;

                    } else {
                        $errorFlag = true;
                        $errorMessage = $response['message'];
                    }
                }


                $commentDetails = null;
                if (!$errorFlag && $accountList != null) {

                    $responseData['selectedUserDetails'] = null;
                    for ($i = 0; $i < count($accountList); $i++) {
                        $responseData['selectedUserDetails'] = $accountList[$i];
                        if ($insUserId == null) {
                            if ($accountList[$i]['status'] == 'A' && $accountList[$i]['is_logged_in'] == 'Y' && $accountList[$i]['is_user_disconnected'] == 'N') {
                                break;
                            }
                        } else {
                            if ($accountList[$i]['ins_user_id'] == $insUserId) {
                                break;
                            }
                        }
                    }
                    $responseData['selectedUserId'] = $responseData['selectedUserDetails']['ins_user_id'];


                    $api_url = $this->API_URL . '/get/automatic/comments';
                    $data1['instaUserId'] = $responseData['selectedUserDetails']['ins_user_id'];
                    $data1['token'] = Session::get('instaffic_user')['token'];
                    $response1 = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data1), true);
                    if (empty($response1)) {
                        $errorFlag = true;
                        $errorMessage = $response1['message'];
                    } else {
                        if ($response1['code'] == 200) {

                            if ($response1['status'] == 'success') {
                                $commentDetails = $response1['data'];
                            }

                        } else {
                            $errorFlag = true;
                            $errorMessage = $response1['message'];
                        }
                    }
                }

                $responseData['accountList'] = $accountList;
                $responseData['commentDetails'] = $commentDetails;
                $commentDataSavedMsg = null;

                if (!$errorFlag) {
                    if (Session::has('commentDataSavedMsg')) {
                        $commentDataSavedMsg = Session::get('commentDataSavedMsg');
                        Session::forget('commentDataSavedMsg');
                    }
                    return view('User::ProfileManagement.automaticComments')->with(['status' => 'success', 'data' => $responseData, 'commentDataSavedMsg' => $commentDataSavedMsg]);
                } else {
                    return view('User::ProfileManagement.automaticComments')->with(['status' => 'failed', 'message' => $errorMessage]);
                }
            } else {
                return view('User::ProfileManagement.automaticComments')->with(['status' => 'failed', 'message' => $errorMessage]);
            }
        }
    }


    //------------------------- SEND AUTOMATIC TAGS -------------------------------------------------------//
    public function automaticTags(Request $request, $insUserId = null)
    {
        if ($request->isMethod('post')) {

            $postData = $request->all();
            $rules = [
                'instaUserId' => 'required|exists:instagram_users,ins_user_id',
                'tagUsersType' => ['required', 'regex:/^(followers|hashtags|locations)+$/'],
                'tagPostsType' => ['required', 'regex:/^(TARGET_POST|NEW_POST)+$/']
            ];
            $messages = [
                'instaUserId.required' => 'Invalid instsgram user id',
                'instaUserId.exists' => 'Invalid instsgram user id',
                'tagUsersType.required' => 'tagUsersType is required',
                'tagUsersType.regex' => 'Invalid tagUsersType value',
                'tagPostsType.required' => 'tagPostsType is required',
                'tagPostsType.regex' => 'Invalid tagPostsType value'
            ];
            $validator = Validator::make($postData, $rules, $messages);

            if (!$validator->fails()) {
                $rules = [];

                if ($postData['tagUsersType'] == 'locations') {
                    $rules['locationData'] = 'required';
                } else if ($postData['tagUsersType'] == 'hashtags') {
                    $rules['hashTagData'] = 'required';
                }

                if ($postData['tagPostsType'] == 'TARGET_POST') {
                    $rules['selectedMediaData'] = 'required';
                }


                $validator = Validator::make($postData, $rules);

                if (!$validator->fails()) {

                    $api_url = $this->API_URL . '/add/automatic/tags';
                    $data['token'] = Session::get('instaffic_user')['token'];
                    $data['instaUserId'] = $postData['instaUserId'];
                    $data['tagUsersType'] = $postData['tagUsersType'];

                    if ($postData['tagUsersType'] == 'locations') {
                        $data['locationData'] = $postData['locationData'];;
                    } else if ($postData['tagUsersType'] == 'hashtags') {
                        $data['hashTagData'] = $postData['hashTagData'];;
                    }


                    $data['tagPostsType'] = $postData['tagPostsType'];
                    if ($postData['tagPostsType'] == 'TARGET_POST') {
                        $data['selectedMediaData'] = $postData['selectedMediaData'];;
                    }

//                    dd($data);
//                    dd(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data));
                    $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
                    if (empty($response)) {

                        $sessionMessageData["message"] = "Server not started";
                        $sessionMessageData["status"] = "failed";
                        Session::put('tagDataSavedMsg', $sessionMessageData);
                        return redirect('/automatic/tags/' . $postData['instaUserId']);
                    } else {
                        if ($response['code'] === 200) {
                            $sessionMessageData["message"] = "AutoComments data saved successfully";
                            $sessionMessageData["status"] = "success";

                            Session::put('tagDataSavedMsg', $sessionMessageData);
                            return redirect('/automatic/tags/' . $postData['instaUserId']);

                        } else {
                            $sessionMessageData["message"] = $response['message'];
                            $sessionMessageData["status"] = "failed'";

                            Session::put('tagDataSavedMsg', $sessionMessageData);
                            return redirect('/automatic/tags/' . $postData['instaUserId']);
                        }
                    }

                } else {

                    return Redirect::back()->withErrors($validator->messages())->withInput();
                }

            } else {

                return Redirect::back()->withErrors($validator->messages())->withInput();
            }


        } else {
            $isValidInstaUserId = true;
            $errorFlag = false;
            $errorMessage = false;
            if ($insUserId != null) {
                $postData['ins_user_id'] = $insUserId;
                $rule = ['ins_user_id' => 'numeric|exists:instagram_users,ins_user_id,added_by_user_id,' . Session::get('instaffic_user')['id']];
                $validator = Validator::make($postData, $rule);
                if ($validator->fails()) {
                    $isValidInstaUserId = false;
                    $errorFlag = true;
                    $errorMessage = 'Invalid URL data';
                }
            }

            if ($isValidInstaUserId) {

                $api_url = $this->API_URL . '/get/instagram/accounts';
                $data['token'] = Session::get('instaffic_user')['token'];
                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

                $responseData = array();
                $accountList = null;
                if (empty($response)) {
                    $errorFlag = true;
                    $errorMessage = $response['message'];
                } else {
                    if ($response['code'] == 200) {
                        $accountList = ($response['status'] == 'success') ? $response['data'] : null;

                    } else {
                        $errorFlag = true;
                        $errorMessage = $response['message'];
                    }
                }

                $tagDetails = null;
                if (!$errorFlag && $accountList != null) {
                    $responseData['selectedUserDetails'] = null;
                    for ($i = 0; $i < count($accountList); $i++) {
                        $responseData['selectedUserDetails'] = $accountList[$i];
                        if ($insUserId == null) {
                            if ($accountList[$i]['status'] == 'A' && $accountList[$i]['is_logged_in'] == 'Y' && $accountList[$i]['is_user_disconnected'] == 'N') {
                                break;
                            }
                        } else {
                            if ($accountList[$i]['ins_user_id'] == $insUserId) {
                                break;
                            }
                        }
                    }
                    $responseData['selectedUserId'] = $responseData['selectedUserDetails']['ins_user_id'];

                    $api_url = $this->API_URL . '/get/automatic/tags';
                    $data1['instaUserId'] = $responseData['selectedUserDetails']['ins_user_id'];
                    $data1['token'] = Session::get('instaffic_user')['token'];
                    $response1 = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data1), true);
                    if (empty($response1)) {
                        $errorFlag = true;
                        $errorMessage = $response1['message'];
                    } else {
                        if ($response1['code'] == 200) {
                            if ($response1['status'] == 'success') {
                                $tagDetails = $response1['data'];
                            }
                        } else {
                            $errorFlag = true;
                            $errorMessage = $response1['message'];
                        }
                    }
                }

                $responseData['accountList'] = $accountList;
                $responseData['tagDetails'] = $tagDetails;

                $tagDataSavedMsg = null;
                if (!$errorFlag) {
                    if (Session::has('tagDataSavedMsg')) {
                        $tagDataSavedMsg = Session::get('tagDataSavedMsg');
                        Session::forget('tagDataSavedMsg');
                    }
                    return view('User::ProfileManagement.automaticTags')->with(['status' => 'success', 'data' => $responseData, 'tagDataSavedMsg' => $tagDataSavedMsg]);
                } else {
                    return view('User::ProfileManagement.automaticTags')->with(['status' => 'failed', 'message' => $errorMessage]);
                }
            } else {
                return view('User::ProfileManagement.automaticTags')->with(['status' => 'failed', 'message' => $errorMessage]);
            }
        }
    }

    public function getUserMedia(Request $request)
    {
        $postData = $request->all();

        $rules = [
            'instaUserId' => 'required|exists:instagram_users,ins_user_id',
            'pagination' => 'required'
        ];

        $messages = [
            'instaUserId.required' => 'Invalid instsgram user id',
            'instaUserId.exists' => 'Invalid instsgram user id',
            'pagination.required' => 'pagination is required'
        ];
        $validator = Validator::make($postData, $rules, $messages);


        if (!$validator->fails()) {

            $api_url = $this->API_URL . '/get/insta/user/media/feed';
            $data['token'] = Session::get('instaffic_user')['token'];
            $data['instaUserId'] = $postData['instaUserId'];
            $data['pagination'] = json_encode($postData['pagination'], true);

//            dd(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data));
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'code' => 400, 'message' => [['Server not started']]], true);
            } else {
//                dd($response);
                if ($response['code'] === 200)
                    echo json_encode(['status' => $response['status'], 'code' => $response['code'], 'data' => isset($response['data']) ? $response['data'] : null, 'message' => $response['message']], true);
                else
                    echo json_encode(['status' => 'failed', 'code' => $response['code'], 'message' => [$response['message']]], true);
            }
        } else {
            echo json_encode(['status' => 'failed', 'code' => 400, 'message' => $validator->messages()], true);
        }
    }

}