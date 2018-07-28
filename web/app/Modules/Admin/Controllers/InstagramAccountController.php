<?php namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Models\Admin;
use App\Modules\Admin\Models\InstaAccount;
use App\Modules\Admin\Models\User;
use Illuminate\curl\CurlRequestHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use stdClass;
use Yajra\Datatables\Datatables;

class InstagramAccountController extends Controller
{


    public function __construct()
    {
        $this->API_URL = env('API_URL');
        $this->API_ACCESS_TOKEN = env('API_ACCESS_TOKEN');
    }

    public function addInstaAccounts(Request $request)
    {
//            email_verify_contact:9263479324
//            proxy_location:USA

//     dd($request->all());
        if ($request->isMethod('post')) {
            $postData = $request->all()['value'];
            $rules = [
                'username' => 'required',
                'password' => 'required',
                'insta_reg_email_id' => 'required|email',
                'insta_reg_email_pwd' => 'required',
                'alternate_reg_email_id' => 'email',
                'alternate_reg_email_pwd' => 'required_with:alternate_reg_email_id',
                'insta_reg_contact' => '',
                'set_proxy' => 'required',
                'gender' => 'required',
                'proxy_ip' => 'ip',
                'proxy_port' => 'required_with:proxy_ip|max:65535',
                'proxy_username' => '',
                'proxy_password' => 'required_with:proxy_username',
            ];
            $rules['set_proxy'] = ['regex:/^(YES|NO)+$/'];
            $rules['gender'] = ['regex:/^(1|2|3)+$/'];
            $rules['proxy_type'] = ['regex:/^(0|1)+$/'];
            $messages = [
                'insta_reg_email_id.required' => 'Registered Email ID is required.',
                'insta_reg_email_id.email' => 'Enter Valid  Registered Email ID.',
                'insta_reg_email_pwd.required' => "Registered Email's Password is required.",
                'proxy_ip.ip' => "Invalid ip address",
                'proxy_port.max' => "Invalid Port Number",
                'proxy_port.required_with' => "Port Number is required",
                'proxy_password.required_with' => "Proxy Password is required",
                'alternate_reg_email_pwd.required_with' => 'alternate Email password is required'
            ];
            $validator = Validator::make($postData, $rules, $messages);

//            dd($validator->messages());
            if (!$validator->fails()) {


                $api_url = $this->API_URL . '/add/instagram/fixed/account';
                $data['device_type'] = 'W';
                $data['API_ACCESS_TOKEN'] = $this->API_ACCESS_TOKEN;
                $data['username'] = $postData['username'];
                $data['password'] = $postData['password'];
                $data['insta_reg_email_id'] = $postData['insta_reg_email_id'];
                $data['insta_reg_email_pwd'] = $postData['insta_reg_email_pwd'];
                $data['gender'] = $postData['gender'];
                $data['set_proxy'] = $postData['set_proxy'];
                $data['proxy_type'] = $postData['proxy_type'];

                if (!empty($postData['alternate_reg_email_id'])) {
                    $data['alternate_reg_email_id'] = $postData['alternate_reg_email_id'];
                    $data['alternate_reg_email_pwd'] = $postData['alternate_reg_email_pwd'];
                }
                if (!empty($postData['insta_reg_contact'])) {
                    $data['insta_reg_contact'] = $postData['insta_reg_contact'];
                }
                if ($postData['set_proxy'] == 'YES') {
                    $data['proxy_ip'] = trim($postData['proxy_ip']);
                    $data['proxy_port'] = trim($postData['proxy_port']);

                    if ($postData['proxy_type'] == 1) {
                        $data['proxy_username'] = trim($postData['proxy_username']);
                        $data['proxy_password'] = trim($postData['proxy_password']);
                    }
                }
                $apiResponse = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);


                if ($apiResponse["code"] == 200 && $apiResponse["status"] == 'success') {
                    return Redirect::back()->with(['admin_success_mes' => $apiResponse['message']]);
                } else if ($apiResponse["code"] == 422) {
                    return Redirect::back()->with(['val_error_mes' => $apiResponse['message']])->withInput();
                } else {
                    if (isset($apiResponse['has_account_locked']) && $apiResponse['has_account_locked'] == 'true') {
                        if (isset($apiResponse['checkPointUrl'])) {
                            $message['message'] = $apiResponse['message'];
                            $message['checkPointUrl'] = $apiResponse['checkPointUrl'];
                            return Redirect::back()->with(['admin_loc_msg' => $message])->withInput();
                        }
                    }

                    return Redirect::back()->with(['admin_error_msg' => $apiResponse['message']])->withInput();
                }
            } else {
                return Redirect::back()->withErrors($validator)->withInput();
            }

        }
        return view('Admin::users.addInstaAccounts');
    }


    public function showInstaAccounts(Request $request)
    {
        if ($request->isMethod('post')) {
//            date_default_timezone_set($request->input('userTimezone'));
//            dd($request->input('userTimezone'));
            $objUserModel = new InstaAccount();
            $postData = $request->all();
//                   dd($postData);
//
            $iTotalRecords = $iDisplayLength = intval($postData['length']);
            $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
            $iDisplayStart = intval($postData['start']);
            $sEcho = intval($postData['draw']);
            $iTotalRecords = $objUserModel->getFilteredAccounts(0,0,0,-2);
            $iTotalFilteredRecords = $iTotalRecords;

            $columns = array(
                'account_id',
                'username',
                'updated_at',
                'status',
            );

            //Displaying records based on sorting orders
            $sortingOrder = "";
            if (isset($postData['order'])) {
                $sortingOrder = [$columns[$postData['order'][0]['column']], $postData['order'][0]['dir']];
            }

            //FIRLTERING START FROM HERE
            $filteringRules = '';
            $whereUserById = array();
            if (isset($postData['action']) && $postData['action'] == 'filter' && $postData['action'][0] != 'filter_cancel') {

                if ($postData['id'] != '') {
                    $filteringRules[] = "( account_id LIKE '%" . $postData['id'] . "%' )";
                }
                if ($postData['username'] != '') {
                    $filteringRules[] = "( username LIKE '%" . $postData['username'] . "%' )";
                }

                if ($postData['date'] != '') {
                    $filteringRules[] = "( updated_at LIKE '%" . $postData['date'] . "%' )";
                }
                if ($postData['status'] != '') {
                    $filteringRules[] = "( status LIKE '%" . $postData['status'] . "%' )";
                }

                if (!empty($filteringRules)) {
                    $whereUserById['rawQuery'] = implode(" AND ", $filteringRules);
                }
                $iTotalFilteredRecords = $objUserModel->getFilteredAccounts($whereUserById, $sortingOrder, $iDisplayStart, -2);

            }


            $result = $objUserModel->getFilteredAccounts($whereUserById, $sortingOrder, $iDisplayStart, $iDisplayLength);

            $records["data"] = array();
            $records["draw"] = $sEcho;
            $records["recordsTotal"] = $iTotalRecords;
            $records["recordsFiltered"] = $iTotalFilteredRecords;

            if (!empty($result)) {
                foreach ($result as $key => $value) {
                    $action = '<button class="btn btn-sm blue viewMore margin-bottom" id ="view' . $value->account_id . '" data-id="' . $value->account_id . '"></i> View More</button>
                             <a class="btn btn-sm red delete_acc" data-id="' . $value->account_id . '"><i class="fa fa-trash"></i>Remove Account</a>';
//                             <a class="btn btn-sm default" href="/edit/insta/accounts/' . $value->account_id . '"><i class="fa fa-pencil-square-o"></i>Edit</a>';

                    $records['data'][] = array(
                        $value->account_id,
                        $value->username,
                        date('d/m/Y', $value->updated_at),
                        ($value->status == 'A') ? 'Active' : 'Inactive',
                        $action
                    );
                }
            }

            echo json_encode($records, true);

        } else {
            return view('Admin::users.showInstaAccounts');
        }
    }


    public function getInstaAccountsDetails(Request $request)
    {
//        sleep(2);
        $id = $request->all()['viewId'];
        $objUserModel = new InstaAccount();
        $result = $objUserModel->getAccountDetails($id);
        $result = $result[0];
//        dd($result->gender);
        $data = array();
        if (isset($result) && !empty($result)) {
            $data['status'] = ($result->status == 'A') ? 'Active' : 'Inactive';
            $data['created_at'] = date('d/m/Y', $result->created_at);
            $data['is_user_disconnected'] = ($result->is_user_disconnected == 'Y') ? 'NO' : 'YES';
            $data['username'] = $result->username;
            $data['password'] = $result->password;
            $data['gender'] = ($result->gender == '1') ? 'Male' : (($result->gender == '2') ? 'Female' : 'Not Specified');
            $data['insta_reg_email_id'] = $result->insta_reg_email_id;
            $data['insta_reg_email_pwd'] = $result->insta_reg_email_pwd;
            $data['alternate_reg_email_id'] = ($result->alternate_reg_email_id == null) ? 'NA' : $result->alternate_reg_email_id;
            $data['alternate_reg_email_pwd'] = ($result->alternate_reg_email_pwd == null) ? 'NA' : $result->alternate_reg_email_pwd;
            $data['insta_reg_contact'] = ($result->insta_reg_contact == null) ? 'NA' : $result->insta_reg_contact;
            $data['email_verify_contact'] = $result->email_verify_contact;
            $data['proxy_ip'] = ($result->proxy_ip == null) ? 'NA' : $result->proxy_ip;
            $data['proxy_port'] = ($result->proxy_port == null) ? 'NA' : $result->proxy_port;
            $data['proxy_type'] = ($result->proxy_type == null) ? 'NA' : (($result->proxy_type == '0') ? 'PUBLIC' : 'PRIVATE');
            $data['proxy_username'] = ($result->proxy_username == null) ? 'NA' : $result->proxy_username;
            $data['proxy_password'] = ($result->proxy_password == null) ? 'NA' : $result->proxy_password;
            return $data;
        } else {
            return $data;
        }
    }


    public function reconnectInstaAccounts(Request $request)
    {
        $postData = $request->all()['value'];
        $rules = [
            'username' => 'required',
            'password' => 'required',
            'insta_reg_email_id' => 'required|email',
            'insta_reg_email_pwd' => 'required',
            'alternate_reg_email_id' => 'email',
            'alternate_reg_email_pwd' => 'required_with:alternate_reg_email_id',
            'insta_reg_contact' => '',
            'set_proxy' => 'required',
            'gender' => 'required',
            'proxy_ip' => 'ip',
            'proxy_port' => 'required_with:proxy_ip|max:65535',
            'proxy_username' => '',
            'proxy_password' => 'required_with:proxy_username',
        ];
        $rules['set_proxy'] = ['regex:/^(YES|NO)+$/'];
        $rules['gender'] = ['regex:/^(1|2|3)+$/'];
        $rules['proxy_type'] = ['regex:/^(0|1)+$/'];
        $messages = [
            'insta_reg_email_id.required' => 'Registered Email ID is required.',
            'insta_reg_email_id.email' => 'Enter Valid  Registered Email ID.',
            'insta_reg_email_pwd.required' => "Registered Email's Password is required.",
            'proxy_ip.ip' => "Invalid ip address",
            'proxy_port.max' => "Invalid Port Number",
            'proxy_port.required_with' => "Port Number is required",
            'proxy_password.required_with' => "Proxy Password is required",
            'alternate_reg_email_pwd.required_with' => 'alternate Email password is required'
        ];
        $validator = Validator::make($postData, $rules, $messages);

//            dd($validator->messages());
        if (!$validator->fails()) {


            $api_url = $this->API_URL . '/add/instagram/fixed/account';
            $data['device_type'] = 'W';
            $data['API_ACCESS_TOKEN'] = $this->API_ACCESS_TOKEN;
            $data['username'] = $postData['username'];
            $data['password'] = $postData['password'];
            $data['insta_reg_email_id'] = $postData['insta_reg_email_id'];
            $data['insta_reg_email_pwd'] = $postData['insta_reg_email_pwd'];
            $data['gender'] = $postData['gender'];
            $data['set_proxy'] = $postData['set_proxy'];
            $data['proxy_type'] = $postData['proxy_type'];

            if (!empty($postData['alternate_reg_email_id'])) {
                $data['alternate_reg_email_id'] = $postData['alternate_reg_email_id'];
                $data['alternate_reg_email_pwd'] = $postData['alternate_reg_email_pwd'];
            }
            if (!empty($postData['insta_reg_contact'])) {
                $data['insta_reg_contact'] = $postData['insta_reg_contact'];
            }
            if ($postData['set_proxy'] == 'YES') {
                $data['proxy_ip'] = $postData['proxy_ip'];
                $data['proxy_port'] = $postData['proxy_port'];

                if ($postData['proxy_type'] == 1) {
                    $data['proxy_username'] = $postData['proxy_username'];
                    $data['proxy_password'] = $postData['proxy_password'];
                }
            }
            $apiResponse = json_decode(CurlRequestHandler::getInstance()->curlUsingPost($api_url, $data), true);


            if ($apiResponse["code"] == 200 && $apiResponse["status"] == 'success') {
                return Redirect::back()->with(['admin_success_mes' => $apiResponse['message']]);
            } else if ($apiResponse["code"] == 422) {
                return Redirect::back()->with(['val_error_mes' => $apiResponse['message']])->withInput();
            } else {
                if (isset($apiResponse['has_account_locked']) && $apiResponse['has_account_locked'] == 'true') {
                    if (isset($apiResponse['checkPointUrl'])) {
                        $message['message'] = $apiResponse['message'];
                        $message['checkPointUrl'] = $apiResponse['checkPointUrl'];
                        return Redirect::back()->with(['admin_loc_msg' => $message])->withInput();
                    }
                }

                return Redirect::back()->with(['admin_error_msg' => $apiResponse['message']])->withInput();
            }
        } else {
            return Redirect::back()->withErrors($validator)->withInput();
        }

    }

    public function editInstaAccounts($viewId, Request $request)
    {

        $objUserModel = new InstaAccount();
        $result = $objUserModel->getAccountDetails($viewId);
        $data = $result[0];
        return view('Admin::users.editInstaAccounts')->with(['data' => $data]);

    }

    public function removeInstaAccount(Request $request)
    {

        try {
            $removeId = $request->all()['removeId'];
            $objUserModel = new InstaAccount();
            $result = $objUserModel->removeAccount($removeId);
            if ($result) {
                return 1;
            }
        } catch (\Exception $e) {
//            return $e->getMessage();
            return 0;
        }
        return 0;


    }

    public function confirmation()
    {

        return view('Admin::users.confirmation');

    }

}