<?php namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Models\Admin;
use App\Modules\Admin\Models\InstaAccount;
use App\Modules\Admin\Models\User;
use App\Modules\Admin\Models\PromotionDefaults;
use Illuminate\curl\CurlRequestHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use yajra\Datatables\Datatables;

class ManageAccountController extends Controller
{

    protected $TOKEN;
    protected $API_URL;
    protected $API_ACCESS_TOKEN;

    public function __construct(){
        $this->API_URL = env('API_URL');
        $this->TOKEN = Session::get('instaffic_user')['token'];
        $this->API_ACCESS_TOKEN = env('API_ACCESS_TOKEN');
    }
    public function promotionDefaults(Request $request){


        if($request->isMethod('post')){
            $data=$request->all();
            $id=$data['id'];
            $value=$data['value'];

            $rules=[
                'min_follower_du'=>'required|numeric|max:5000|min:1',
                'max_follower_du'=>'required|numeric|max:5000|min:1',
                'min_likes_du'=>'required|numeric|max:5000|min:1',
                'max_likes_du'=>'required|numeric|max:5000|min:1',
                'min_follower_pu'=>'required|numeric|max:5000|min:1',
                'max_follower_pu'=>'required|numeric|max:5000|min:1',
                'min_likes_pu'=>'required|numeric|max:5000|min:1',
                'max_likes_pu'=>'required|numeric|max:5000|min:1',
                'min_follower_bu'=>'required|numeric|max:5000|min:1',
                'max_follower_bu'=>'required|numeric|max:5000|min:1',
                'min_likes_bu'=>'required|numeric|max:5000|min:1',
                'max_likes_bu'=>'required|numeric|max:5000|min:1',
                'min_hashtag'=>'required|numeric|max:5000|min:1',
                'max_hashtag'=>'required|numeric|max:5000|min:1',
                'max_expose_profile'=>'required|numeric|max:5000|min:1',
            ];
            $message=[
//                'min_follower_du.numeric'=>'Invalid id data',
//                'id.required'=>'Invalid id data',
//                'value.required'=>'Invalid value data'
            ];
            $validator=Validator::make($value,$rules,$message);
            if(!$validator->fails()){
                $appendQueryData='';
                $bind_data=[];
                $value=array_values($value);
                for($i=0;$i<count($id);$i++){
                    $appendQueryData=$appendQueryData.'(?,?,'.time().'),';
                    array_push($bind_data,$id[$i],$value[$i]);
                }
                $appendQueryData=  substr($appendQueryData,0,strlen($appendQueryData)-1);
                $bind_data=json_decode(json_encode($bind_data,JSON_NUMERIC_CHECK));
                $query = "INSERT INTO app_default_values (app_dafault_value_id,app_dafault_count,updated_at) VALUES".$appendQueryData." ON DUPLICATE KEY UPDATE app_dafault_count=VALUES(app_dafault_count), updated_at=VALUES(updated_at)";
                $promotionDefault=new PromotionDefaults();
                $update_result=$promotionDefault->setDefaults(['rawQuery' => $query, 'bindParams' => $bind_data]);
                if($update_result){
                    return back()->with(['success'=>'Default Data Updated Successfuly']);

                }else{
                    return back()->with(['fail'=>'Failed, Data Not Updated']);
                }
            }else{
                dd($validator->messages());
                return back()->withInput()->withErrors($validator);
            }
        }else{

            $select=['app_dafault_value_id','app_dafault_name','subcriber_type','app_dafault_count'];
            $promotionDefault=new PromotionDefaults();
            $promotionDefault=$promotionDefault->getDefaults($select);
            return view('Admin::users.defaultSettings')->with('data',$promotionDefault);
        }
    }

    public function showProxies(Request $request){
        if($request->isMethod('post')){
            $users = new Collection();
            $Admin = new Admin();
            $result = $Admin->showProxies();

            foreach ($result as $res) {

                if ($res->proxy_status == 'A') {
                    $status = '<div class="btn-group"><button class="btn btn-sm green-meadow  margin-bottom dropdown-toggle change_proxy_status" type="button" data-toggle="dropdown" aria-expanded="false" data-id="' . $res->proxy_id . '" data-status="' . $res->proxy_status . '" title="click to block this proxy">Active</button></div>';
                } else {
                    $status = '<div class="btn-group"><button class="btn btn-sm yellow-casablanca margin-bottom dropdown-toggle change_proxy_status" type="button" data-toggle="dropdown" aria-expanded="false" data-id="' . $res->proxy_id . '" data-status="' . $res->proxy_status . '" title="click to activate this proxy">Blocked</button></div>';
                }
                $users->push([
                    'proxy_id' => $res->proxy_id,
                    'proxy_ip' => $res->proxy_ip,
                    'proxy_port' => $res->proxy_port,
                    'proxy_type' => ($res->proxy_type=='0')?'Public':'Private',
                    'proxy_username' => isset($res->proxy_username)?$res->proxy_username:'NA',
                    'proxy_password' => isset($res->proxy_password)?$res->proxy_password:'NA',
                    'proxy_status' => $status,
                    'added_date' => date('d/m/Y', $res->created_at),
                    'last_modified' => date('d/m/Y', $res->updated_at),
                    'proxy_location' => isset($res->proxy_location)?$res->proxy_location:'NA',
                    'delete' => '<a class="btn btn-sm red deleteUserProxy" id="' . $res->proxy_id . '"><i class="fa fa-trash"></i>Remove Proxy</a>'
                ]);
            }

            return Datatables::of($users)->make(true);
        }
        return view('Admin::users.addProxy');
    }

    public function changeProxyStatus(Request $request){

        try {
            $postData = $request->all();
            $user_id = $postData['user_id'];
            $status = $postData['user_status'];
            $objUserModel = new Admin();

            if ($status == 'A') {
                $updated_data = ['proxy_status' => 'B'];
            } else if ($status == 'B') {
                $updated_data = ['proxy_status' => 'A'];
            } else {
                return 0;
            }

            $result = $objUserModel->updateProxyStatus($user_id, $updated_data);
            if ($result===1) {
                return 1;
            }
        } catch (\Exception $e) {

            return 0;
//            return $e->getMessage();
        }
        return 0;
    }

    public function deleteProxy(Request $request)
    {

        try {
            $id = $request->all();
            if (empty($id['id']) || !is_numeric($id['id'])) {
                return 204;
            }
            $instance = new Admin();
            $res = $instance->deleteProxy($id);
            if ($res === 1) {
                return 200;
            } else if ($res === 0) {
                return 202;
            } else {
                return 204;
            }
        } catch (\Exception $e) {
            return 204;
        }
    }

    public function saveProxy(Request $request)
    {
        $postData = $request->all();
        $rules = [
            'proxy_collection' => 'required'
        ];

        $messages = [
            'proxy_collection.required' => 'Invalid Collection'
        ];

        foreach ($postData['proxy_collection'] as $key => $val) {
            foreach ($val as $key1 => $val1) {
                $index = 'proxy_collection.' . $key . '.' . $key1;
                switch ($key1) {
                    case 'proxy_ip':
                        $rules[$index] = 'required|ip';
                        break;
                    case 'proxy_port':
                        $rules[$index] = 'required|integer|min:0|max:65535';
                        break;
                    case 'proxy_location':
                        $rules[$index] = 'required';
                        break;
                    case 'proxy_type':
                        $rules[$index] = ['regex:/^(0|1)+$/'];
                        break;
                    case 'proxy_username':
                        $rules[$index] = "required";
                        break;
                    case 'proxy_password':
                        $rules[$index] = "required";
                        break;
                }
            }
        }

        foreach ($postData['proxy_collection'] as $key => $val) {

            foreach ($val as $key1 => $val1) {
                $messages['proxy_collection.' . $key . '.' . $key1 . '.required'] = 'The field labeled "Book Title ' . $key . '' . $key1 . '" must be less than :max characters.';
            }
        }
        $validator = Validator::make($postData, $rules);
        if (!$validator->fails()) {
            $appendQueryData = '';
            $bind_data = [];
            foreach ($postData['proxy_collection'] as $key => $val) {
                if ($val['proxy_type'] == 0) {
                    $val['proxy_username'] = null;
                    $val['proxy_password'] = null;
                }
                $val['updated_at'] = time();
                $val['created_at'] = time();

                $params = array_values($val);
                $appendQueryData = $appendQueryData . '(?,?,?,?,?,?,?,?),';
                $bind_data = array_merge($bind_data, $params);
            }
            $appendQueryData = substr($appendQueryData, 0, strlen($appendQueryData) - 1);
            $columns = 'proxy_ip,proxy_port,proxy_location,proxy_type,proxy_username,proxy_password,created_at,updated_at';
            $queryWhere = 'INSERT INTO  proxy_details (' . $columns . ') VALUES ' . $appendQueryData . ' ON DUPLICATE KEY UPDATE
                           proxy_port=VALUES(proxy_port), proxy_location=VALUES(proxy_location),proxy_type=VALUES(proxy_type),
                           proxy_username=VALUES(proxy_username), proxy_password=VALUES(proxy_password),
                           created_at=VALUES(created_at),updated_at=VALUES(updated_at)';

            $Obj = new Admin();
            $result = $Obj->saveProxy($queryWhere, $bind_data);

//                $result = Proxy::updateOrCreate(['proxy_ip' => $val['proxy_ip']], $val);
            if ($result === true) {
                return 200;
            } else {
                return 204;
            }

        } else
            $errorMessage = [];
        foreach ($validator->errors()->getMessages() as $key => $value) {
//                dd('======>',$key,$value);.
            $index = explode('.', $key)[1];
            $key = explode('.', $key)[2];
            $message = explode('.', $value[0])[2];
            $errorMessage[$index][$key] = $message;

        }
        return json_encode($errorMessage);
    }

    public function uploadProxyFile(Request $request)
    {
//        dd($request->input('proxyType'));

//        dd($request->hasFile('proxyFile'));

        if ($request->hasFile('proxyFile') && $request->has('proxyType')) {

            $proxyFile = $request->file('proxyFile');
            $proxyType = $request->input('proxyType');
            if ($proxyFile->isValid()) {
                $filePath = $proxyFile->getPathname();
                $fileName = $proxyFile->getClientOriginalName();
                $fileExtention = $proxyFile->getClientOriginalExtension();
                $fileMimeType = $proxyFile->getMimeType();
//                dd($fileMimeType);

                if ($fileExtention == 'txt') {

                    $ip = '';
                    $port = '';
                    $username = null;
                    $password = null;
                    $location = null;
                    $proxy_type = 0;
                    $dbQuery = "INSERT INTO proxy_details (proxy_ip,proxy_port,proxy_location,proxy_type,proxy_username,proxy_password,updated_at,created_at) VALUES";
                    $bindParam = [];
                    $content = file($filePath);
                    foreach ($content as $line) {
                        $resLocation = explode(' ', trim($line));
                        if (count($resLocation) == 2) {
                            $location = $resLocation[1];
                        }
                        $resData = explode(':', trim($resLocation[0]));
                        dd($resData);
                        if (count($resData) == 2) {
                            $ip = $resData[0];
                            $port = $resData[1];
                            if (filter_var($ip, FILTER_VALIDATE_IP) === false) {

                                return 500;
                            }
                            if ($port > 65535 || $port < 1024) {

                                return 500;
                            }
                        } else if (count($resData) == 4) {
                            $proxy_type = 1;
                            $ip = $resData[0];
                            $port = $resData[1];
                            $username = $resData[2];
                            $password = $resData[3];
                            if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
                                return 500;
                            }
                            if ($port > 65535 || $port < 0) {
                                return 500;
                            }
                        } else {
                            return 400;
                        }
                        $dbQuery .= "(?,?,?,?,?,?,?,?), ";
                        $bindParam[] = $ip;
                        $bindParam[] = $port;
                        $bindParam[] = $location;
                        $bindParam[] = $proxy_type;
                        $bindParam[] = $username;
                        $bindParam[] = $password;
                        $bindParam[] = time();
                        $bindParam[] = time();
                    }

                    $dbQuery = substr($dbQuery, 0, strlen($dbQuery) - 2);
                    $dbQuery .= "ON DUPLICATE KEY UPDATE proxy_location = VALUES(proxy_location),proxy_type = VALUES(proxy_type),
                    proxy_username = VALUES(proxy_username),proxy_password = VALUES(proxy_password),updated_at = VALUES(updated_at)";
                    $obj = new Admin();
                    $result = $obj->saveProxyFile($dbQuery, $bindParam);
                    if ($result === true) {
                        return 200;
                    } else {
                        return 400;
                    }
                } else {
                    return 501;
                }
            } else {
                return 502;
            }
        }

    }

    public function uploadGenderProxyFile(Request $request)
    {
        if ($request->hasFile('genderProxyFile')) {
            $proxyFile = $request->file('genderProxyFile');
            if ($proxyFile->isValid()) {
                $filePath = $proxyFile->getPathname();
                $fileName = $proxyFile->getClientOriginalName();
                $fileExtention = $proxyFile->getClientOriginalExtension();
                $fileMimeType = $proxyFile->getMimeType();
//                dd($fileMimeType);
                if ($fileExtention == 'txt') {
                    $ip = '';
                    $port = '';
                    $username = null;
                    $password = null;
                    $location = null;
                    $proxy_type = 0;
                    $dbQuery = "INSERT INTO gender_proxies (proxy_ip,proxy_port,proxy_location,proxy_type,
                                    proxy_username,proxy_password,updated_at,created_at) VALUES";
                    $bindParam = [];
                    $content = file($filePath);
                    foreach ($content as $line) {
                        $resLocation = explode(' ', trim($line));
                        if (count($resLocation) == 2) {
                            $location = $resLocation[1];
                        }
                        $resData = explode(':', trim($resLocation[0]));
                        if (count($resData) == 2) {
                            $ip = $resData[0];
                            $port = $resData[1];
                            if (filter_var($ip, FILTER_VALIDATE_IP) === false) {

                                return 500;
                            }
                            if ($port > 65535 || $port < 0) {

                                return 500;
                            }
                        } else if (count($resData) == 4) {
                            $proxy_type = 1;
                            $ip = $resData[0];
                            $port = $resData[1];
                            $username = $resData[2];
                            $password = $resData[3];
                            if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
                                return 500;
                            }
                            if ($port > 65535 || $port < 0) {
                                return 500;
                            }
                        } else {
                            return 400;
                        }
                        $dbQuery .= "(?,?,?,?,?,?,?,?), ";
                        $bindParam[] = $ip;
                        $bindParam[] = $port;
                        $bindParam[] = $location;
                        $bindParam[] = $proxy_type;
                        $bindParam[] = $username;
                        $bindParam[] = $password;
                        $bindParam[] = time();
                        $bindParam[] = time();
                    }

                    $dbQuery = substr($dbQuery, 0, strlen($dbQuery) - 2);
                    $dbQuery .= "ON DUPLICATE KEY UPDATE proxy_location = VALUES(proxy_location),proxy_type = VALUES(proxy_type),
                    proxy_username = VALUES(proxy_username),proxy_password = VALUES(proxy_password),updated_at = VALUES(updated_at)";
                    $obj = new Admin();
                    $result = $obj->saveProxyFile($dbQuery, $bindParam);
                    if ($result === true) {
                        return 200;
                    } else {
                        return 400;
                    }
                } else {
                    return 501;
                }
            } else {
                return 502;
            }
        }

    }

    public function filterGenderProxy()
    {
        $api_url = $this->API_URL . '/validate/working/gender/proxy';
        $data['device_type'] = 'W';
        $data['API_ACCESS_TOKEN'] = $this->API_ACCESS_TOKEN;
        $apiResponse = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);
        if ($apiResponse["code"] == 200 && $apiResponse["status"] == 'success') {
            return 200;
        }else {
            return 400;
        }
    }

    public function showGenderProxies(Request $request)
    {

        if ($request->isMethod('post')) {

            $objUserModel = new Admin();
            $postData = $request->all();

            $iTotalRecords = $iDisplayLength = intval($postData['length']);
            $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
            $iDisplayStart = intval($postData['start']);
            $sEcho = intval($postData['draw']);

            $iTotalRecords = $objUserModel->getFilteredProxy(0, 0, 0, -2);
//            $iTotalRecords = $objUserModel->getAllUsers();
            $iTotalFilteredRecords = $iTotalRecords;

            $columns = array(//order is important
                "proxy_id",
                "proxy_ip",
                "proxy_port",
                "proxy_username",
                "proxy_password",
                "proxy_location",
                "updated_at",
                "created_at",
                "proxy_status",
                "proxy_type",
            );

            //Displaying records based on sorting orders
//            dd($postData['order']);
            $sortingOrder = "";
            if (isset($postData['order'])) {
                $sortingOrder = [$columns[$postData['order'][0]['column']], $postData['order'][0]['dir']];
            }
            //FIRLTERING START FROM HERE
            $filteringRules = '';
            $whereUserById = array();

            if (isset($postData['action']) && $postData['action'] == 'filter' && $postData['action'][0] != 'filter_cancel') {

                if ($postData['p_id'] != '') {
                    $filteringRules[] = "( proxy_id LIKE '%" . $postData['p_id'] . "%' )";
                }
                if ($postData['p_ip'] != '') {
                    $filteringRules[] = "( proxy_ip LIKE '%" . $postData['p_ip'] . "%' )";
                }

                if ($postData['p_port'] != '') {
                    $filteringRules[] = "( proxy_port LIKE '%" . $postData['p_port'] . "%' )";
                }
                if ($postData['p_username'] != '') {
                    $filteringRules[] = "( proxy_username LIKE '%" . $postData['p_username'] . "%' )";
                }
                if ($postData['p_password'] != '') {
                    $filteringRules[] = "( proxy_password LIKE '%" . $postData['p_password'] . "%' )";
                }
                if ($postData['p_location'] != '') {
                    $filteringRules[] = "( proxy_location LIKE '%" . $postData['p_location'] . "%' )";
                }
//                if ($postData['modified_date'] != '') {
//                    $filteringRules[] = "( updated_at LIKE '%" . $postData['modified_date'] . "%' )";
//                }
//                if ($postData['added_date'] != '') {
//                    $filteringRules[] = "( created_at LIKE '%" . $postData['added_date'] . "%' )";
//                }
                if ($postData['status'] != '') {
                    $filteringRules[] = "( proxy_status LIKE '%" . $postData['status'] . "%' )";
                }
                if ($postData['p_type'] != '') {
                    $filteringRules[] = "( proxy_type LIKE '%" . $postData['p_type'] . "%' )";
                }
                if (!empty($filteringRules)) {
                    $whereUserById['rawQuery'] = implode(" AND ", $filteringRules);
                }
                $iTotalFilteredRecords = $objUserModel->getFilteredProxy($whereUserById, $sortingOrder, $iDisplayStart, -2);
            }


            $result = $objUserModel->getFilteredProxy($whereUserById, $sortingOrder, $iDisplayStart, $iDisplayLength);
//            dd($result);

            $records["data"] = array();
            $records["draw"] = $sEcho;
            $records["recordsTotal"] = $iTotalRecords;

            $records["recordsFiltered"] = $iTotalFilteredRecords;

            if (!empty($result)) {
                foreach ($result as $key => $value) {

                    $records['data'][] = array(
                        $value->proxy_id,
                        $value->proxy_ip,
                        $value->proxy_port,
                        (!empty($value->proxy_username)?$value->proxy_username:'NA'),
                        (!empty($value->proxy_password)?$value->proxy_password:'NA'),
                        (!empty($value->proxy_location)?$value->proxy_location:'NA'),
                        date('d/m/Y',$value->updated_at),
                        date('d/m/Y',$value->created_at),
                        ($value->proxy_status == 'P') ? 'Pending' : (($value->proxy_status == 'A') ? 'Active':'Blocked'),
                        ($value->proxy_type == '0') ? 'Public' : 'Private',

//
                        ''
                    );
                }
            }
            echo json_encode($records, true);
        } else {
            return view('Admin::users.showGenderProxy');
        }
    }

    /**
     * @desc option to add free time to any account by admin
     * @param Request $request
     * @return $this|\BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @since 30-nov-2017
     * @author Nitish Kumar <nitishkumar@globussoft.in>
     */
    public function addFreeSubscription(Request $request){

        if($request->isMethod('post')){
            $postData=$request->all();
            $rules=[
                'username'=>'required|exists:instagram_users,username',
                'package'=>'required|between:1,2',
                'days'=>'required_without:months|between:1,4',
                'months'=>'required_without:days|between:1,4'
            ];
            $message=[
                'username.required'=>'please provide username.',
                'package.required'=>'Please select one subscription package.',
                'username.exists'=>'This username is not found in this system, please add first or try with others.',
                'days.required_without'=>'Please Provide Number of Days or Months.',
                'months.required_without'=>'Please Provide Number of Days or Months.'
            ];
            $validator=Validator::make($postData,$rules,$message);
            if(!$validator->fails()){
                $package_type=($postData['package']==1)?'BU':'PU';
                $second_in_1_day=86400;
                $second_in_1_month=2592000;

                $add_time=0;
                if(!empty($postData['days']))
                {
                    switch($postData['days']){
                        case '1':$add_time+=7*$second_in_1_day;break;
                        case '2':$add_time+=14*$second_in_1_day;break;
                        case '3':$add_time+=21*$second_in_1_day;break;
                        case '4':$add_time+=28*$second_in_1_day;break;
                    }
                }
                if(!empty($postData['months']))
                {
                    switch($postData['months']){
                        case '1':$add_time+=1*$second_in_1_month;break;
                        case '2':$add_time+=3*$second_in_1_month;break;
                        case '3':$add_time+=6*$second_in_1_month;break;
                        case '4':$add_time+=12*$second_in_1_month;break;
                    }
                }
                $update_data=[
                    'username'=>$postData['username'],
                    'package_type'=>$package_type,
                    'add_time'=>$add_time,
                ];
                $modal=new InstaAccount();

                $update_time=$modal->updateFreeSubscription($update_data);
                if($update_time){
                    return back()->with('success','Subscription time added Successfully.please check your account');
                }else{
                    return back()->withInput()->with('fail','Something went wrong.Please try Again.');
                }
            }else{

                return back()->withInput()->withErrors($validator);
            }
        }else{
            return view('Admin::users.addFreeSubscription');
        }

    }

    /**
     * @desc dedicated proxy for added instagram account by  users
     * @param Request $request
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @since 30-nov-2017
     * @author Nitish Kumar <nitishkumar@globussoft.in>
     */
    public function showInstaAccountProxies(Request $request)
    {
        if ($request->isMethod('post')) {

            $objUserModel = new Admin();
            $postData = $request->all();

            $iTotalRecords = $iDisplayLength = intval($postData['length']);
            $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
            $iDisplayStart = intval($postData['start']);
            $sEcho = intval($postData['draw']);

            $iTotalRecords = $objUserModel->getFilteredInstaProxy(0, 0, 0, -2);
//            $iTotalRecords = $objUserModel->getAllUsers();
            $iTotalFilteredRecords = $iTotalRecords;

            $columns = array(//order is important
                "proxy_id",
                "proxy_ip",
                "proxy_port",
                "proxy_username",
                "proxy_password",
                "proxy_location",
                "updated_at",
                "created_at",
                "isAllocated",
                "proxy_status",
            );

            //Displaying records based on sorting orders

            $sortingOrder = "";
            if (isset($postData['order'])) {
                $sortingOrder = [$columns[$postData['order'][0]['column']], $postData['order'][0]['dir']];
            }
            //FIRLTERING START FROM HERE
            $filteringRules = '';
            $whereUserById = array();
//            dd($postData['p_id']);
            if (isset($postData['action']) && $postData['action'] == 'filter' && $postData['action'][0] != 'filter_cancel') {


                if ($postData['p_id'] != '') {
                    $filteringRules[] = "( proxy_id LIKE '%" . $postData['p_id'] . "%' )";
                }
//                dd('wait');
                if ($postData['p_ip'] != '') {
                    $filteringRules[] = "( proxy_ip LIKE '%" . $postData['p_ip'] . "%' )";
                }

                if ($postData['p_port'] != '') {
                    $filteringRules[] = "( proxy_port LIKE '%" . $postData['p_port'] . "%' )";
                }
                if ($postData['p_username'] != '') {
                    $filteringRules[] = "( proxy_username LIKE '%" . $postData['p_username'] . "%' )";
                }
                if ($postData['p_password'] != '') {
                    $filteringRules[] = "( proxy_password LIKE '%" . $postData['p_password'] . "%' )";
                }
                if ($postData['p_location'] != '') {
                    $filteringRules[] = "( proxy_location LIKE '%" . $postData['p_location'] . "%' )";
                }
                if ($postData['allocation'] != '') {
                    $filteringRules[] = "( isAllocated LIKE '%" . $postData['allocation'] . "%' )";
                }
//                if ($postData['modified_date'] != '') {
//                    $filteringRules[] = "( updated_at LIKE '%" . $postData['modified_date'] . "%' )";
//                }
//                if ($postData['added_date'] != '') {
//                    $filteringRules[] = "( created_at LIKE '%" . $postData['added_date'] . "%' )";
//                }
                if ($postData['status'] != '') {
                    $filteringRules[] = "( proxy_status LIKE '%" . $postData['status'] . "%' )";
                }
                if (!empty($filteringRules)) {
                    $whereUserById['rawQuery'] = implode(" AND ", $filteringRules);
                }
                $iTotalFilteredRecords = $objUserModel->getFilteredInstaProxy($whereUserById, $sortingOrder, $iDisplayStart, -2);
            }


            $result = $objUserModel->getFilteredInstaProxy($whereUserById, $sortingOrder, $iDisplayStart, $iDisplayLength);
//            dd($result);

            $records["data"] = array();
            $records["draw"] = $sEcho;
            $records["recordsTotal"] = $iTotalRecords;

            $records["recordsFiltered"] = $iTotalFilteredRecords;

            if (!empty($result)) {
                foreach ($result as $key => $value) {

                    $records['data'][] = array(
                        $value->proxy_id,
                        $value->proxy_ip,
                        $value->proxy_port,
                        (!empty($value->proxy_username)?$value->proxy_username:'NA'),
                        (!empty($value->proxy_password)?$value->proxy_password:'NA'),
                        (!empty($value->proxy_location)?$value->proxy_location:'NA'),
                        date('d/m/Y',$value->updated_at),
                        date('d/m/Y',$value->created_at),
                        ($value->isAllocated == '0') ? 'Free' : 'In Use',
                        ($value->proxy_status == 'P') ? 'Pending' : (($value->proxy_status == 'A') ? 'Active':'Blocked'),

//
                        ''
                    );
                }
            }
            echo json_encode($records, true);
        } else {
            return view('Admin::users.showInstaAccountProxy');
        }
    }

    /**
     * @desc upload proxy file for instagram accounts
     * @param Request $request
     * @return int
     * @since 30-nov-2017
     * @author Nitish Kumar <nitishkumar@globussoft.in>
     */
    public function uploadAccountProxyFile(Request $request)
    {
//        dd('account proxy',$request->all());
        if ($request->hasFile('accountProxyFile')) {
            $proxyFile = $request->file('accountProxyFile');
            if ($proxyFile->isValid()) {
                $filePath = $proxyFile->getPathname();
                $fileName = $proxyFile->getClientOriginalName();
                $fileExtention = $proxyFile->getClientOriginalExtension();
                $fileMimeType = $proxyFile->getMimeType();
//                dd($fileMimeType);
                if ($fileExtention == 'txt') {

                    $ip = '';
                    $port = '';
                    $username = null;
                    $password = null;
                    $location = null;
                    $proxy_type = 0;
                    $dbQuery = "INSERT INTO insta_account_proxies (proxy_ip,proxy_port,proxy_location,proxy_type,
                                    proxy_username,proxy_password,updated_at,created_at) VALUES";
                    $bindParam = [];
                    $content = file($filePath);
                    foreach ($content as $line) {
                        $resLocation = explode(' ', trim($line));
                        if (count($resLocation) == 2) {
                            $location = $resLocation[1];
                        }
                        $resData = explode(':', trim($resLocation[0]));
                        if (count($resData) == 2) {
                            $ip = $resData[0];
                            $port = $resData[1];
                            if (filter_var($ip, FILTER_VALIDATE_IP) === false) {

                                return 500;
                            }
                            if ($port > 65535 || $port < 0) {

                                return 500;
                            }
                        } else if (count($resData) == 4) {
                            $proxy_type = 1;
                            $ip = $resData[0];
                            $port = $resData[1];
                            $username = $resData[2];
                            $password = $resData[3];
                            if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
                                return 500;
                            }
                            if ($port > 65535 || $port < 0) {
                                return 500;
                            }
                        } else {
                            return 400;
                        }
                        $dbQuery .= "(?,?,?,?,?,?,?,?), ";
                        $bindParam[] = $ip;
                        $bindParam[] = $port;
                        $bindParam[] = $location;
                        $bindParam[] = $proxy_type;
                        $bindParam[] = $username;
                        $bindParam[] = $password;
                        $bindParam[] = time();
                        $bindParam[] = time();
                    }

                    $dbQuery = substr($dbQuery, 0, strlen($dbQuery) - 2);
                    $dbQuery .= "ON DUPLICATE KEY UPDATE proxy_location = VALUES(proxy_location),proxy_type = VALUES(proxy_type),
                    proxy_username = VALUES(proxy_username),proxy_password = VALUES(proxy_password),updated_at = VALUES(updated_at)";
                    $obj = new Admin();
                    $result = $obj->saveProxyFile($dbQuery, $bindParam);
                    if ($result === true) {
                        return 200;
                    } else {
                        return 400;
                    }
                } else {
                    return 501;
                }
            } else {
                return 502;
            }
        }else{
            return 503;
        }

    }

}