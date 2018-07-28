<?php namespace App\Modules\User\Controllers;


use App\Http\Controllers\Auth\UserAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\curl\CurlRequestHandler;

require public_path() . '/../vendor/autoload.php';

//require __DIR__ . '../vendor/autoload.php';

class InstagramController extends Controller
{
    protected $API_URL;

    public function __construct()
    {
        $this->API_URL = env('API_URL');
    }


    //------------------------- ADD INSTAGRAM ACCOUNT ---------------------------------------------------//
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

    public function addInstagramAccount_old(Request $request)
    {
        $postData = $request->all();
        $rules = [
            'username' => 'required|unique:instagram_users,username',
            'password' => 'required',
        ];
        $validator = Validator::make($postData, $rules);
        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/addInstagramAccount';
            $data['username'] = $postData['username'];
            $data['password'] = $postData['password'];
            $data['CLIENT_IP'] = $this->get_client_ip();
            $data['token'] = Session::get('instaffic_user')['token'];
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'message' => ['Server not started']], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode(['status' => 'success', 'message' => 'Account Added successful'], true);
                else
                    echo json_encode($response, true);
            }
        } else {
            echo json_encode(['status' => 'failed', 'message' => $validator->messages()], true);
        }
    }// Without proxy

    public function addInstagramAccount(Request $request)
    {
        $postData = $request->all();
        $rules['username'] = 'required|unique:instagram_users,username';
        $rules['password'] = 'required';

        if (isset($postData['setProxy']) && $postData['setProxy'] == 1) {
            $rules['proxy_ip'] = 'required|ip';
            $rules['proxy_port'] = ['required', 'regex:/^((6553[0-5])|(655[0-2][0-9])|(65[0-4][0-9]{2})|(6[0-4][0-9]{3})|([1-5][0-9]{4})|([1-9][0-9]{1,3}))$/'];
            $rules['proxy_username'] = 'required';
            $rules['proxy_password'] = 'required';
        }
        $message = ['proxy_port.regex' => 'Invalid proxy port value.'];

        $validator = Validator::make($postData, $rules, $message);
        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/add/insta/account/with/proxy/option';
            $data['username'] = $postData['username'];
            $data['password'] = $postData['password'];

            $data['setProxy'] = 0;
            if (isset($postData['setProxy']) && $postData['setProxy'] == 1) {
                $data['setProxy'] = 1;
                $data['proxy_ip'] = $postData['proxy_ip'];
                $data['proxy_port'] = $postData['proxy_port'];
                $data['proxy_username'] = $postData['proxy_username'];
                $data['proxy_password'] = $postData['proxy_password'];
            }

            $data['CLIENT_IP'] = $this->get_client_ip();
            $data['token'] = Session::get('instaffic_user')['token'];

            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'message' => ['Server not started']], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode(['status' => 'success', 'message' => 'Account Added successful'], true);
                else
                    echo json_encode($response, true);
            }
        } else {
            echo json_encode(['status' => 'failed', 'message' => $validator->messages()], true);
        }
    } //With proxy

    public function checkAccountProxy(Request $request)
    {
        $postData = $request->all();
        $rules['proxy_ip'] = 'required|ip';
        $rules['proxy_port'] = ['required', 'regex:/^((6553[0-5])|(655[0-2][0-9])|(65[0-4][0-9]{2})|(6[0-4][0-9]{3})|([1-5][0-9]{4})|([1-9][0-9]{1,3}))$/'];
        $rules['proxy_username'] = 'required';
        $rules['proxy_password'] = 'required';

        $message = ['proxy_port.regex' => 'Invalid proxy port value.'];

        $validator = Validator::make($postData, $rules, $message);
        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/check/account/proxy';
            $data['proxy_ip'] = $postData['proxy_ip'];
            $data['proxy_port'] = $postData['proxy_port'];
            $data['proxy_username'] = $postData['proxy_username'];
            $data['proxy_password'] = $postData['proxy_password'];

            $data['CLIENT_IP'] = $this->get_client_ip();
            $data['token'] = Session::get('instaffic_user')['token'];

            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'message' => ['Server not started']], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode(['status' => 'success', 'code' => 200, 'message' => 'Proxy checked successful'], true);
                else
                    echo json_encode($response, true);
            }
        } else {
            echo json_encode(['status' => 'failed', 'message' => $validator->messages()], true);
        }
    } //Check proxy

    //------------------------- DASHBOARD INSTAGRAM ACCOUNT DETAILS --------------------------------------//
    public function loadInstagramAccount(Request $request)
    {
        if ($request->isMethod('get')) {
            $api_url = $this->API_URL . '/loadInstagramAccount';
            $data['token'] = Session::get('instaffic_user')['token'];
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'message' => ['Server not started']], true);
            } else {
                if ($response['code'] === 200) {
                    echo json_encode(['status' => 'success', 'data' => $response['data']], true);
                } else
                    echo json_encode(['status' => 'failed', 'message' => [$response['message']]], true);
            }
        }
    }

    //------------------------- ACTIVATE AND DEACTIVATE ACCOUNT --- --------------------------------------//
    public function changeAccountStatus(Request $request)
    {
        if ($request->isMethod('post')) {

            $validator = Validator::make($request->all(), ['ins_user_id' => 'required|exists:instagram_users,ins_user_id']);
            if (!$validator->fails()) {

                $api_url = $this->API_URL . '/changeAccountStatus';
                $data['token'] = Session::get('instaffic_user')['token'];
                $data['instaUserId'] = json_encode($request['ins_user_id'], true);
                $data['mode'] = $request['mode'];

                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

                if (empty($response)) {
                    echo json_encode(['status' => 'failed', 'message' => ['Server not started']], true);
                } else {
                    if ($response['code'] === 200)
                        echo json_encode(['status' => 'success', 'message' => [$response['message']]], true);
                    else
                        echo json_encode(['status' => 'failed', 'message' => [$response['message']]], true);
                }
            } else {
                echo json_encode(['status' => 'failed', 'message' => $validator->messages()], true);
            }

        }
    }

    public function checkAccountStatus(Request $request)
    {
        if ($request->isMethod('get')) {
            $api_url = $this->API_URL . '/check/account/status';
            $data['token'] = Session::get('instaffic_user')['token'];
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'message' => ['Server not started']], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode(['status' => 'success', 'message' => [$response['message']], 'data' => $response['data']], true);
                else
                    echo json_encode(['status' => 'failed', 'message' => [$response['message']]], true);
            }
        }
    }


    //------------------------- RECONNECT & VERIFY INSTAGRAM ACCOUNT ------------------------------------//
    public function reconnectAccount(Request $request)
    {
        $postData = $request->all();
        $rules = [
            'username' => 'required|exists:instagram_users,username',
            'password' => 'required',
        ];

        $validator = Validator::make($postData, $rules);

        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/reconnect/account';
            $data['username'] = $postData['username'];
            $data['password'] = $postData['password'];
            $data['token'] = Session::get('instaffic_user')['token'];
//dd(json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data)));
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'message' => ['Server not started']], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode(['status' => 'success', 'message' => 'Account has beeen Re-Connected successful'], true);
                else
                    echo json_encode($response, true);
            }
        } else {
            echo json_encode(['status' => 'failed', 'message' => $validator->messages()], true);
        }
    }

    public function changePromotionSettings(Request $request)
    {
        $postData = $request->all();
        $rules['instaUserId']='required|exists:instagram_users,ins_user_id';
        $rules['type'] = ['required','regex:/^(F|D)+$/'];
        $rules['status'] = ['required','regex:/^(0|1)$/'];

        $validator = Validator::make($postData, $rules);

        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/change/promotion/settings';
            $data['instaUserId'] = $postData['instaUserId'];
            $data['type'] = $postData['type'];
            $data['status'] = $postData['status'];
            $data['token'] = Session::get('instaffic_user')['token'];
//dd(json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data)));
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'message' => ['Server not started']], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode(['status' => 'success', 'message' => $response['message']], true);
                else
                    echo json_encode($response, true);
            }
        } else {
            echo json_encode(['status' => 'failed', 'message' => $validator->messages()], true);
        }
    }


    //------------------------- INSTAGRAM FINDER AND DETAILS--------------------------------------------//
    public function instagramFinder(Request $request)
    {
        if ($request->isMethod('post')) {

            $validator = Validator::make($request->all(), ['searchValue' => 'required']);
            if (!$validator->fails()) {

                $api_url = $this->API_URL . '/instagramFinder';
                $data['token'] = Session::get('instaffic_user')['token'];
                $data['searchValue'] = $request['searchValue'];

                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

                if (empty($response)) {
                    echo json_encode(['status' => 'failed', 'message' => ['Error in Api service']], true);
                } else {
                    if ($response['code'] === 200) {


                        $instagramUsersDetails = array();
                        $instagramUsers = null;
                        $api_url = $this->API_URL . '/get/instagram/accounts';
                        $data['token'] = Session::get('instaffic_user')['token'];
                        $account_response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);


                        if ($account_response['code'] == 200) {
                            $instagramUsers = ($account_response['status'] == 'success') ? $account_response['data'] : null;

                        }

                        if ($instagramUsers) {
                            for ($i = 0; $i < sizeof($instagramUsers); $i++) {
                                if ($instagramUsers[$i]['status'] == 'A' &&
                                    $instagramUsers[$i]['is_logged_in'] == 'Y' &&
                                    $instagramUsers[$i]['is_user_disconnected'] == 'N' &&
                                    $instagramUsers[$i]['has_account_locked'] == 'F'
                                ) {
                                    array_push($instagramUsersDetails,$instagramUsers[$i]);
                                }
                            }
                        }
//                        return response()->json(array('code' => 401, 'status' => 'failed', 'message' => $response['message']));


                        echo json_encode(['status' => 'success', 'data' => $response['data'], 'instaUsers' => $instagramUsersDetails], true);
                    } else
                        echo json_encode(['status' => 'failed', 'message' => $response['message']], true);
                }
            } else {
                echo json_encode(['status' => 'failed', 'message' => 'No search content provided'], true);
            }

        } else {


            if (isset($request['searchValue']) && $request['searchValue'] != null) {
                return view('User::instagram.instaFinder')->with(['searchValue' => $request['searchValue']]);
            } else {
                return view('User::instagram.instaFinder')->with(['searchValue' => null]);
            }
        }
    }

    public function instaFinderDetails(Request $request)
    {
        if ($request->isMethod('post')) {

            if (isset($request['methodName']) && $request['methodName'] == 'searchDetails') {

                if ($request['finderType'] === 'user') {
                    $api_url = $this->API_URL . '/instaUserDetails';
                    $data['token'] = Session::get('instaffic_user')['token'];
                    $data['user'] = html_entity_decode($request['value']);
                    $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
                    if (empty($response)) {
                        echo json_encode(['status' => 'failed', 'message' => ['Server not started']], true);
                    } else {
                        if ($response['code'] === 200)
                            echo json_encode(['status' => 'success', 'detailsType' => 'user', 'data' => $response['data']['user']], true);
                        else
                            echo json_encode(['status' => 'failed', 'message' => $response['message']], true);
                    }
                } else if ($request['finderType'] === 'tag') {

                    $api_url = $this->API_URL . '/instaTagDetails';
                    $data['token'] = Session::get('instaffic_user')['token'];
                    $data['tag'] = html_entity_decode($request['value']);

                    $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

                    if (empty($response)) {
                        echo json_encode(['status' => 'failed', 'message' => ['Server not started']], true);
                    } else {
                        if ($response['code'] === 200)
                            echo json_encode(['status' => 'success', 'detailsType' => 'tag', 'data' => $response['data']['tag']], true);
                        else
                            echo json_encode(['status' => 'failed', 'message' => $response['message']], true);
                    }
                } else {
                    $api_url = $this->API_URL . '/instaLocationDetails';
                    $data['token'] = Session::get('instaffic_user')['token'];
                    $data['locationId'] = html_entity_decode($request['value']);
                    $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
//
                    if (empty($response)) {
                        echo json_encode(['status' => 'failed', 'message' => ['Server not started']], true);
                    } else {
                        if ($response['code'] === 200)
                            echo json_encode(['status' => 'success', 'detailsType' => 'location', 'data' => $response['data']['location']], true);
                        else
                            echo json_encode(['status' => 'failed', 'message' => $response['message']], true);
                    }
                }
            } else {
                $instagramUsersDetails = array();
                $instagramUsers = null;
                $api_url = $this->API_URL . '/get/instagram/accounts';
                $data['token'] = Session::get('instaffic_user')['token'];
                $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

                if ($response['code'] == 200) {
                    $instagramUsers = ($response['status'] == 'success') ? $response['data'] : null;

                }

                if ($instagramUsers) {
                    for ($i = 0; $i < sizeof($instagramUsers); $i++) {
                        if ($instagramUsers[$i]['status'] == 'A' &&
                            $instagramUsers[$i]['is_logged_in'] == 'Y' &&
                            $instagramUsers[$i]['is_user_disconnected'] == 'N' &&
                            $instagramUsers[$i]['has_account_locked'] == 'F'
                        ) {
                            array_push($instagramUsersDetails,$instagramUsers[$i]);
                        }
                    }
                }
                return view('User::instagram.instaFinderDetails')->with(['finderType' => $request['type'], 'value' => $request['value'], 'instaUsers' => $instagramUsersDetails]);
            }
        } else {
            return view('User::instagram.instaFinder')->with(['searchValue' => null]);
        }
    }


    //------------------------- INCREASE LIKES, COMMENTS AND FOLLOW FROM INSTAFINDER -----------------//
    public function increaseMediaLikes(Request $request)
    {
        $postData = $request->all();
        $rule = [
            "mediaId" => 'required',
            "insUserId" => 'required'
        ];
        $validator = Validator::make($postData, $rule);
        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/increaseInstaLikes';
            $data['mediaId'] = $request->input('mediaId');
            $data['insUserId'] = json_encode($request->input('insUserId'));
            $data['token'] = Session::get('instaffic_user')['token'];

            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'message' => ['Server not started']], true);
            } else {
                if ($response['code'] === 200) {
                    echo json_encode(['code' => 200, 'status' => 'success', 'message' => $response['message']], true);
                } else
                    echo json_encode(['code' => 400, 'status' => 'failed', 'message' => $response['message']], true);
            }
        } else {
            echo json_encode(['code' => 400, 'status' => 'failed', 'message' => $validator->messages()], true);
        }
    }

    public function increaseMediaComments(Request $request)
    {
        $postData = $request->all();
        $rule = [
            "mediaId" => 'required',
            "insUserId" => 'required',
            "comments" => 'required'
        ];
        $validator = Validator::make($postData, $rule);
        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/increaseInstaComments';
            $data['mediaId'] = $request->input('mediaId');
            $data['insUserId'] = json_encode($request->input('insUserId'));
            $data['comments'] = json_encode($request->input('comments'));
            $data['token'] = Session::get('instaffic_user')['token'];

            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'message' => ['Server not started']], true);
            } else {
                if ($response['code'] === 200) {
                    echo json_encode(['code' => 200, 'status' => 'success', 'message' => $response['message']], true);
                } else
                    echo json_encode(['code' => 400, 'status' => 'failed', 'message' => $response['message']], true);
            }
        } else {
            echo json_encode(['code' => 400, 'status' => 'failed', 'message' => $validator->messages()], true);
        }
    }

    public function instaFollowAccounts(Request $request)
    {
        $api_url = $this->API_URL . '/insta/follow/accounts';
        $data['accountId'] = $request->input('accountId');
        $data['accountUsername'] = $request->input('accountUsername');
        $data['accountProfilePic'] = $request->input('accountProfilePic');
        $data['accountFollowers'] = $request->input('accountFollowers');
        $data['insUserId'] = json_encode($request->input('insUserId'));
        $data['token'] = Session::get('instaffic_user')['token'];

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

    }


    //-------------------------- INSTAGRAM BOOKMARK POSTS --------------------------------------------//
    public function bookmarkPost(Request $request)
    {
        if ($request->isMethod('post')) {

            $api_url = $this->API_URL . '/bookmarkPost';
            $data['token'] = Session::get('instaffic_user')['token'];
            $data['imgCaption'] = $request['img_caption'];
            $data['imgUrl'] = $request['img_url'];
//            $data['imgUrl'] = null;


            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'message' => ['Server not started']], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode(['status' => 'success', 'message' => $response['message']], true);
                else
                    echo json_encode(['status' => 'failed', 'message' => [$response['message']]], true);
            }
        }
    }

    public function showBookmarkPost(Request $request)
    {
        if ($request->isMethod('post')) {


            $api_url = $this->API_URL . '/showBookmarkPost';
            $data['token'] = Session::get('instaffic_user')['token'];

            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'message' => ['Server not started']], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode(['status' => 'success', 'data' => $response['data'], 'message' => $response['message']], true);
                else
                    echo json_encode(['status' => 'failed', 'message' => [$response['message']]], true);
            }
        } else {
            return view('User::instagram.showBookmarkPost');
        }
    }

    public function deleteBookmarkedPost(Request $request)
    {
        if ($request->isMethod('post')) {

            $api_url = $this->API_URL . '/deleteBookmarkedPost';
            $data['token'] = Session::get('instaffic_user')['token'];
            $data['bookmarkId'] = $request['bookmark_id'];

            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'message' => ['Server not started']], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode(['status' => 'success', 'message' => $response['message']], true);
                else
                    echo json_encode(['status' => 'failed', 'message' => [$response['message']]], true);
            }
        } else {
            return view('User::instagram.showBookmarkPost');
        }
    }


    //------------------------ UPLOAD IMAGE TO INSTAGRAM FROM INSTAFINDER ---------------------------//
    public function uploadImage(Request $request)
    {
        if ($request->isMethod('post')) {

            $postData = $request->all();
            $data = array();
            $rules['serviceType'] = ['required', 'regex:/^(BOOKMARK|SCHEDULE|FINDER|DEFAULT)+$/'];

            if (!isset($postData['caption'])) {
                $rules['caption'] = 'required';
            }

            $validator = Validator::make($postData, $rules);
            if (!$validator->fails()) {
                switch ($postData['serviceType']) {
                    case 'BOOKMARK' :
                        $rules['bookmarkId'] = 'required|exists:post_bookmarks,post_bookmark_id';
                        $data['bookmarkId'] = isset($postData['bookmarkId']) ? $postData['bookmarkId'] : null;
                        break;
                    case 'SCHEDULE' :
                        $rules['mediaId'] = 'required|exists:media_details,media_id';
                        $data['mediaId'] = isset($postData['mediaId']) ? $postData['mediaId'] : null;
                        break;
                    case 'FINDER' :
//                        $rules['imageUrl'] = ['required', 'regex:/^(https:\/\/instagram(.*?)|(https://scontent.cdninstagram.com))+/'];
                        $rules['imageUrl'] = 'required';
                        $data['imageUrl'] = isset($postData['imageUrl']) ? $postData['imageUrl'] : null;
                        break;
                    case 'DEFAULT' :
                        $rules['base64Image'] = ['required', 'regex:/^data:(image\/(jpg|jpeg|png));base64,(.*?)+/'];
                        $data['base64Image'] = isset($postData['base64Image']) ? $postData['base64Image'] : null;
                        break;
                    default:
                        break;
                }

                $validator1 = Validator::make($postData, $rules);

                if (!$validator1->fails()) {

                    $api_url = $this->API_URL . '/uploadImage';
                    $data['token'] = Session::get('instaffic_user')['token'];
                    $data['serviceType'] = $postData['serviceType'];
                    $data['caption'] = $postData['caption'];

                    $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

                    if (empty($response)) {
                        echo json_encode(['status' => 'failed', 'code' => 400, 'message' => ['Server not started']], true);
                    } else {
                        if ($response['code'] === 200)
                            echo json_encode(['status' => 'success', 'code' => 200, 'data' => $response['data'], 'message' => $response['message']], true);
                        else if ($response['code'] === 404)
                            echo json_encode(['status' => 'success', 'code' => 404, 'data' => $response['data'], 'message' => $response['message']], true);
                        else
                            echo json_encode(['status' => 'failed', 'code' => 400, 'message' => [$response['message']]], true);
                    }

                } else {
                    echo json_encode(['status' => 'failed', 'code' => 400, 'message' => $validator1->messages()], true);
                }
            } else {
                echo json_encode(['status' => 'failed', 'code' => 400, 'message' => $validator->messages()], true);
            }

        }
    }


    //------------------------ SCHEDULING POST FROM INSTAFINDER ---------------------------//
    public function schedulePost(Request $request)
    {
        if ($request->isMethod('post')) {
            $postData = $request->all();
            $data = array();
            $rules['serviceType'] = ['required', 'regex:/^(BOOKMARK|SCHEDULE|FINDER|DEFAULT)+$/'];
            $rules['scheduleTime'] = 'required';
            $rules['user_timezone'] = 'required';
            if (!isset($postData['caption'])) {
                $rules['caption'] = 'required';
            }

            $validator = Validator::make($postData, $rules);
            if (!$validator->fails()) {
                switch ($postData['serviceType']) {
                    case 'BOOKMARK' :
                        $rules['bookmarkId'] = 'required|exists:post_bookmarks,post_bookmark_id';
                        $data['bookmarkId'] = isset($postData['bookmarkId']) ? $postData['bookmarkId'] : null;
                        break;
                    case 'SCHEDULE' :
                        $rules['mediaId'] = 'required|exists:media_details,media_id';
                        $data['mediaId'] = isset($postData['mediaId']) ? $postData['mediaId'] : null;
                        break;
                    case 'FINDER' :
//                        $rules['imageUrl'] = ['required', 'regex:/^(https:\/\/instagram(.*?)|(https://scontent.cdninstagram.com))+/'];
                        $rules['imageUrl'] ='required';
                        $data['imageUrl'] = isset($postData['imageUrl']) ? $postData['imageUrl'] : null;
                        break;
                    case 'DEFAULT' :
                        $rules['base64Image'] = ['required', 'regex:/^data:(image\/(jpg|jpeg|png));base64,(.*?)+/'];
                        $data['base64Image'] = isset($postData['base64Image']) ? $postData['base64Image'] : null;
                        break;
                    default:
                        break;
                }

//                dd($postData);
                $validator1 = Validator::make($postData, $rules);

                if (!$validator1->fails()) {

                    $api_url = $this->API_URL . '/schedulePost';
                    $data['token'] = Session::get('instaffic_user')['token'];
                    $data['serviceType'] = $postData['serviceType'];
                    $data['caption'] = $postData['caption'];
                    $data['scheduleTime'] = $postData['scheduleTime'];
                    $data['user_timezone'] = $postData['user_timezone'];

                    $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

//                    dd($response);
                    if (empty($response)) {
                        echo json_encode(['status' => 'failed', 'code' => 400, 'message' => ['Server not started']], true);
                    } else {
                        if ($response['code'] === 200)
                            echo json_encode(['status' => 'success', 'code' => 200, 'message' => $response['message']], true);
                        else  if ($response['code'] === 422)
                            echo json_encode(['status' => 'failed', 'code' => 422, 'message' => [$response['message']]], true);
                        else
                            echo json_encode(['status' => 'failed', 'code' => 400, 'message' => [$response['message']]], true);
                    }
                } else {
                    echo json_encode(['status' => 'failed', 'code' => 400, 'message' => $validator1->messages()], true);
                }
            } else {
                echo json_encode(['status' => 'failed', 'code' => 400, 'message' => $validator->messages()], true);
            }
        }
    }

    public function reSchedulePost(Request $request)
    {
        if ($request->isMethod('post')) {

            $api_url = $this->API_URL . '/reSchedulePost';
            $data['token'] = Session::get('instaffic_user')['token'];
            $data['mediaId'] = $request['mediaId'];
            $data['reScheduleTime'] = $request['reScheduleTime'];
            $data['user_timezone'] =$request['user_timezone'];
            $data['caption'] = $request['caption'];
//            dd($data);

            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'message' => ['Server not started']], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode(['status' => 'success', 'message' => $response['message']], true);
                else  if ($response['code'] === 422)
                    echo json_encode(['status' => 'failed', 'code' => 422, 'message' => [$response['message']]], true);
                else
                    echo json_encode(['status' => 'failed', 'code' => 400, 'message' => [$response['message']]], true);
            }
        }
    }

    public function showScheduledPost(Request $request)
    {
        if ($request->isMethod('post')) {
            $api_url = $this->API_URL . '/getScheduledPost';
            $data['token'] = Session::get('instaffic_user')['token'];

            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'message' => ['Server not started']], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode(['status' => 'success', 'data' => $response['data'], 'message' => $response['message']], true);
                else
                    echo json_encode(['status' => 'failed', 'message' => $response['message']], true);
            }
        } else {
            return view('User::instagram.scheduledPosts');
        }
    }

    public function deleteScheduledPost(Request $request)
    {
        if ($request->isMethod('post')) {

            $api_url = $this->API_URL . '/deleteScheduledPost';
            $data['token'] = Session::get('instaffic_user')['token'];
            $data['mediaId'] = $request['mediaId'];

            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

            if (empty($response)) {
                echo json_encode(['status' => 'failed', 'message' => ['Server not started']], true);
            } else {
                if ($response['code'] === 200)
                    echo json_encode(['status' => 'success', 'message' => $response['message']], true);
                else
                    echo json_encode(['status' => 'failed', 'message' => $response['message']], true);
            }
        }
    }



    //------------SEARCH MORE DETAILS BASED ON USERNAME, LOCATION AND HASHTAGS---------------------------//
    public function hashTagFinder(Request $request)
    {
        $postData = $request->all();
        $rule = ['tag' => 'required'];
        $validator = Validator::make($postData, $rule);
        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/instagramHashTagFinder';
            $data['token'] = Session::get('instaffic_user')['token'];
            $data['tag'] = $postData['tag'];
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (isset($response["data"])) {
                if (($response["data"] == [])) {
                    return 201;
                }
                return $response["data"];
            } else {
                return 202;
            }
        } else {
            return 202;
        }
    }

    public function userNameFinder(Request $request)
    {
        $postData = $request->all();
        $rule = ['searchValue' => 'required'];
        $validator = Validator::make($postData, $rule);
        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/instagramUserFinder';
            $data['token'] = Session::get('instaffic_user')['token'];
            $data['searchValue'] = $postData['searchValue'];
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (isset($response["data"])) {
                if (($response["data"] == [])) {
                    return 201;
                }
                return $response["data"];
            } else {
                return 202;
            }
        } else {
            return 202;
        }
    }

    public function findLocation(Request $request)
    {
        $postData = $request->all();
        $rule = ['searchLocation' => 'required'];
        $validator = Validator::make($postData, $rule);
        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/searchInstaLocation';
            $data['token'] = Session::get('instaffic_user')['token'];
            $data['searchLocation'] = $postData['searchLocation'];
            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
            if (isset($response["data"])) {
                if (($response["data"] == [])) {
                    return 201;
                }
                return $response["data"];
            } else {
                return 202;
            }
        } else {
            return 202;
        }
    }


    // ----------------PAGINATION DETAILS FOR USERNAME DETAILS-------(Start)----(Nitish)-----------------//
    public function getProfileSetting(Request $request, $instaId)
    {


        $InstaUsername = $request->input('InstaUsername');
        $inputs['token'] = Session::get('instaffic_user')['token'];
        $inputs['instaUserId'] = $instaId;
        $inputs['InstaUsername'] = $InstaUsername;

        $result = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/getInstaUserProfileDetails", $inputs), true);

        if ($result["code"] == 200 && $result["status"] == 'success') {
            $instaId = $result['data']['user'][0]['id'];
            $InstaUsername = $result['data']['user'][0]['username'];

            if (view()->exists('User::ProfilePromotion.getProfileSetting')) {
                return view('User::ProfilePromotion.getProfileSetting')->with([
                    'instaId' => $instaId,
                    'InstaUsername' => $InstaUsername,
                    'data' => $result['data'],
                ]);
            } else {
                return view('error_page')->with(['err' => 'no view exists']);
            }
        } else {
            dd($result);
        }


    }

    public function mediaPaginationDetails(Request $request)
    {
        if ($request->isMethod('post')) {
            $postData = $request->all();
            $rules = [
                'instaUserId' => 'required|numeric',
                'media_after' => 'required',
            ];
            $message = [
                'instaUserId.required' => 'Please Provide instaUserId',
                'instaUserId.numeric' => 'instaUserId must be numeric value',
                'media_after.required' => 'Please Provide media_after',
//                'media_after.numeric' => 'media_after must be numeric value',
            ];
            $validator = Validator::make($postData, $rules, $message);

            if (!$validator->fails()) {
                $instaUserId = $request->instaUserId;
                $media_after = $request->media_after;
                $inputs['token'] = Session::get('instaffic_user')['token'];
                $inputs['instaUserId'] = $instaUserId;
                $inputs['media_after'] = $media_after;

                $apiProfilePaginationDetails = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/getPaginationInstaUserProfileDetails", $inputs), true);
                if ($apiProfilePaginationDetails["code"] == 200 && $apiProfilePaginationDetails["status"] == 'success') {
                    return response()->json(['status' => 'success', 'code' => 200, 'data' => $apiProfilePaginationDetails['data']]);
                } else {
                    return response()->json(['status' => 'fail', 'code' => 400, 'data' => []]);
                }
            } else {
                return response()->json(['status' => 'fail', 'code' => 400, 'data' => $validator->messages()]);
            }
        } else {
            dd('get is not supported');
        }


    }

}