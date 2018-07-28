<?php
/**
 * Created by PhpStorm.
 * User: GLB-212
 * Date: 9/9/2016
 * Time: 4:29 PM
 */

namespace App\Modules\User\Controllers\PromotionManagement;

use Illuminate\curl\CurlRequestHandler;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class MessageController extends Controller
{
    protected $API_URL;

    public function __construct()
    {
        $this->API_URL = env('API_URL');
    }

    public function DirectMessageTargetgroup()
    {

        $data['token'] = Session::get('instaffic_user')['token'];
        $From_user = '';
        $user_details = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/get/instagram/accounts", $data), true);
        if (isset($user_details) && !empty($user_details["data"])) {
            $From_user = $user_details["data"];

        }
//        $data['for_insta_id'] = $post_data['for_insta_id'];
        $getGroups_tokenId = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/getAllGroups", $data), true);

//        dd($getGroups_tokenId);
        $created_MessageGroups = '';
        $created_MessageGroups_final = '';

        if (isset($getGroups_tokenId) && !empty($getGroups_tokenId['data'])) {
            $created_MessageGroups = $getGroups_tokenId['data'];

            $size1 = sizeof($From_user);
            $size2 = sizeof($created_MessageGroups);
            $z = 0;
            for ($j = 0; $j < $size2; $j++) {
                for ($i = 0; $i < $size1; $i++) {
                    if ($created_MessageGroups[$j]['for_instagram_user_id'] == $From_user[$i]['ins_user_id']) {
                        $created_MessageGroups_final[$z]['From_user'] = $From_user[$i];
                        $created_MessageGroups_final[$z]['created_MessageGroups'] = $created_MessageGroups[$j];
                        $z++;

                    }
                }
            }
        }
//        dd($created_MessageGroups_final);
        return view("User::PromotionManagement.Message.DirectMessageTargetgroup")->with([
            "From_user" => $From_user,
            "created_MessageGroups_final" => $created_MessageGroups_final
        ]);
    }

    public function createTargetGroup(Request $request)
    {
        $postData = $request->all();
        $rules = [
            'insta_account' => 'required|integer',
            'group_name' => 'required',
        ];
        $message = [
            'insta_account.required' => 'No instagram account selected',
            'insta_account.integer' => 'Invalid instagram account',
            'group_name.required' => 'Provide some group name'
        ];
        $validator = Validator::make($postData, $rules, $message);
        if (!$validator->fails()) {
            $api_url = $this->API_URL . '/createGroup';
            $data['token'] = Session::get('instaffic_user')['token'];
            $data['insta_account'] = $postData['insta_account'];
            $data['group_name'] = $postData['group_name'];

            $data['insagram_hashtag'] = '';
            if (isset($postData['insagram_hashtag'])) {
                $data['insagram_hashtag'] = json_encode($postData['insagram_hashtag']);
            }

            $data['loc_id_plus_name'] = '';
            if (isset($postData['loc_id_plus_name'])) {
                $data['loc_id_plus_name'] = json_encode($postData['loc_id_plus_name']);
            }


            $data['id_plus_username'] = '';
            if (isset($postData['id_plus_username'])) {
                $data['id_plus_username'] = json_encode($postData['id_plus_username']);
            }

            $response = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);

            if ($response['code'] == 200 && $response['status'] = 'success') {
                return response()->json(['code' => 200, 'status' => 'success', 'data' => '', 'message' => 'group created']);
            } else {
                return response()->json(['code' => 400, 'status' => 'failed', 'data' => 'Unable to create group']);
            }

        } else {
            return response()->json(['code' => 400, 'status' => 'failed', 'data' => $validator->messages()]);

        }
    }

    public function DeleteGroupByGroupId()
    {
        $data['token'] = Session::get('instaffic_user')['token'];
        $all = Input::all();
        $data['target_group_id'] = $all['TG_group_id'];
        $data['ins_user_id'] = $all['TG_user_id_createdby'];
        $result = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/DeleteTargetGroupById", $data), true);
//        dd($result);
        if($result['code']==200){
            return 200;
        }else{
            return 400;
        }

    }

    //for sending group messsage===============start============

    public function GroupMessage()
    {
        $data['token'] = Session::get('instaffic_user')['token'];
        $From_user = '';
        $user_details = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/get/instagram/accounts", $data), true);
        if (isset($user_details) && !empty($user_details["data"])) {
            $From_user = $user_details["data"];
        }
        return view("User::PromotionManagement.Message.GroupMessage")->with([
            "From_user" => $From_user
        ]);
    }

    public function SendGroupMessage(Request $request)
    {
        $imgUploadRes = [];
        if ($request->isMethod('post')) {
            $ajaxData = $request->all();
            $rules = [
                'target_group_id' => 'required|integer',
                'account' => 'required|integer',
                'groupText' => 'required',
                'img' => 'required'
            ];
            $message = [
                'target_group_id.required' => 'Provide group to send message',
                'target_group_id.integer' => 'Invalid group',
                'account.required' => 'Choose some Instagram account',
                'account.integer' => 'Invalid account',
                'groupText.required' => 'Provide text to be sent',
                'img.required' => 'select some image',
            ];
            $validator = Validator::make($ajaxData, $rules, $message);
            if (!$validator->fails()) {

                $target_group_id = $ajaxData['target_group_id'];
                $account = $ajaxData['account'];
                $groupText = $ajaxData['groupText'];
                $image = $ajaxData['img'];
                $isValidImage = explode(',', $image)[0] == 'data:image/jpeg;base64';
                if ($isValidImage) {
                    $data['token'] = Session::get('instaffic_user')['token'];
                    $data['base64image']=$image;
                    $data['account']=$account;
                    $data['target_group_id']=$target_group_id;
                    $data['groupText']=$groupText;
                    $data['exn'] = "jpeg";
                    $imgUploadRes = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . '/groupMessage', $data), true);


                    if ($imgUploadRes['code'] == 200 && $imgUploadRes['status'] = 'success') {

                        return ['code' => 200];
                    }


                    if ($imgUploadRes['code'] == 401 && $imgUploadRes['status'] = 'failed') {
                        return ['code' => 401];
                    }
                    dd($imgUploadRes);
                }
                else {
                    return response()->json(['code'=>200 ,'status'=>'failed','data'=>'Invalid Image']);
                }
            } else {
                dd($validator->messages());
                return response()->json(['code'=>400 ,'status'=>'failed','data'=>$validator->messages()]);
                dd('validation failed');
                return true;
            }

            if (Input::file('file')->isValid()) {
                $path = Input::file('file');
                $extension = $path->getClientOriginalExtension();

                $imageData = file_get_contents($path);
                dd($imageData);
                $base64 = 'data:image/' . $extension . ';base64,' . base64_encode($imageData);
                $data['token'] = Session::get('instaffic_user')['token'];
                $data['base64image'] = $base64;
                $data['exn'] = $extension;

                $imgUploadRes = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . '/groupMessage', $data), true);
                dd($imgUploadRes);
            }

        } else {
            dd('get is not supported');
        }
    }

    public function getGroupById(Request $request)
    {

//        sleep(10);

        if ($request->isMethod('post')) {
            $groups = [];
            $post_data = $request->all();
//            dd($post_data);
            $data['for_insta_id'] = $post_data['for_insta_id'];
            $data['token'] = Session::get('instaffic_user')['token'];
            $targetGroups = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/getTargetGroupDetails", $data), true);
            if ($targetGroups['code'] == 200 && $targetGroups['status'] == 'success') {

                $groups = $targetGroups['data'];
//                return ['data'=>$groups];
//                echo json_encode(['status' => 'success','code'=>200, 'data' => $groups], true);
                return response()->json(['status' => 'success', 'code' => 200, 'data' => $groups]);

            } else if (($targetGroups['code'] == 400 && $targetGroups['status'] == 'failed')) {
                $groups = [];
//                return json_decode()['data'=>$groups];
                return response()->json(['status' => 'failed', 'code' => 400, 'data' => $groups]);
            }

        } else {
            dd('get is not supported');
        }


//        return 'hello,sorry for waiting about 10 sec, I m here again';

    }

    public function getUniqueGroup(Request $request){

        if ($request->isMethod('post')) {
            $post_data = $request->all();
            $groups=[];
            $data['for_insta_id'] = $post_data['for_insta_id'];
            $data['target_group_id'] = $post_data['target_group_id'];
            $data['token'] = Session::get('instaffic_user')['token'];
            $targetGroups = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($this->API_URL . "/getUniqueGroup", $data), true);

            if ($targetGroups['code'] == 200 && $targetGroups['status'] == 'success') {
                $groups = $targetGroups['data'];
                return response()->json(['status' => 'success', 'code' => 200, 'data' => $groups]);

            } else if (($targetGroups['code'] == 400 && $targetGroups['status'] == 'failed')) {
                $groups = [];
//                return json_decode()['data'=>$groups];
                return response()->json(['status' => 'failed', 'code' => 400, 'data' => $groups]);
            }

        } else {
            //redirect to error page
            dd('get is not supported');
        }

    }

    //for sending group messsage===============end==============

}