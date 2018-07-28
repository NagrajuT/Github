<?php namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Models\Admin;
use App\Modules\Admin\Models\Proxy;
use App\Modules\Admin\Models\User;

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

class ManageUsersController extends Controller
{

    public function showUsers(Request $request)
    {

        if ($request->isMethod('post')) {

            $objUserModel = new User();
            $postData = $request->all();

            $iTotalRecords = $iDisplayLength = intval($postData['length']);
            $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
            $iDisplayStart = intval($postData['start']);
            $sEcho = intval($postData['draw']);

            $iTotalRecords = $objUserModel->getFilteredUsers(0, 0, 0, -2);
//            $iTotalRecords = $objUserModel->getAllUsers();
            $iTotalFilteredRecords = $iTotalRecords;

            $columns = array(
                'id',
                'email',
                'created_at',
                'register_type',
                'status'
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
                    $filteringRules[] = "( id LIKE '%" . $postData['id'] . "%' )";
                }
                if ($postData['email'] != '') {
                    $filteringRules[] = "( email LIKE '%" . $postData['email'] . "%' )";
                }

                if ($postData['status'] != '') {
                    $filteringRules[] = "( status LIKE '%" . $postData['status'] . "%' )";
                }
                if ($postData['reg_date'] != '') {
                    $filteringRules[] = "( created_at LIKE '%" . $postData['reg_date'] . "%' )";
                }
                if ($postData['reg_type'] != '') {
                    $filteringRules[] = "( register_type LIKE '%" . $postData['reg_type'] . "%' )";
                }
                if (!empty($filteringRules)) {
                    $whereUserById['rawQuery'] = implode(" AND ", $filteringRules);
                }
                $iTotalFilteredRecords = $objUserModel->getFilteredUsers($whereUserById, $sortingOrder, $iDisplayStart, -2);
            }


            $result = $objUserModel->getFilteredUsers($whereUserById, $sortingOrder, $iDisplayStart, $iDisplayLength);

            $records["data"] = array();
            $records["draw"] = $sEcho;
            $records["recordsTotal"] = $iTotalRecords;

            $records["recordsFiltered"] = $iTotalFilteredRecords;

            if (!empty($result)) {
                foreach ($result as $key => $value) {
                    $action = '<button class="btn btn-sm blue viewMore margin-bottom" id ="view' . $value->id . '" data-id="' . $value->id . '"></i> View More</button>';
                    $status = '<div class="btn-group">';
                    if ($value->status == 'A') {
                        $status .= '<button class="btn btn-sm green-meadow  margin-bottom dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" data-id="' . $value->id . '">';
                        $status .= 'Active';
                        $status .= '&nbsp <i class="fa fa-angle-down"></i></button>';
                        $status .= '<ul class="dropdown-menu" role="menu">
                                    <li class="user_status"><a href="javascript:;" data-status="I">Inactive</a></li>
                                    <li class="user_status"><a href="javascript:;" data-status="D">Deleted</a></li>
                                 </ul>';
                    } else if ($value->status == 'I') {
                        $status .= '<button class="btn btn-sm yellow-casablanca  margin-bottom dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" data-id="' . $value->id . '">';

                        $status .= 'Inactive';
                        $status .= '&nbsp<i class="fa fa-angle-down"></i></button>';
                        $status .= '<ul class="dropdown-menu" role="menu">
                                    <li class="user_status"><a href="javascript:;" data-status="A">Active</a></li>
                                    <li class="user_status"><a href="javascript:;" data-status="D">Deleted</a></li>
                                 </ul>';
                    } else {
                        $status .= '<button class="btn btn-sm red-thunderbird margin-bottom dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" data-id="' . $value->id . '">';
                        $status .= 'Deleted';
                        $status .= '&nbsp<i class="fa fa-angle-down"></i></button>';
                        $status .= '<ul class="dropdown-menu" role="menu">
                                   <li class="user_status"><a href="javascript:;" data-status="A">Active</a></li>
                                    <li class="user_status"><a href="javascript:;" data-status="I">Inactive</a></li>
                                 </ul>';
                    }

                    $status .= '</div>';

                    $records['data'][] = array(
                        $value->id,
                        $value->email,
                        date('d/m/Y',$value->created_at),
                        ($value->register_type == 'DR') ? 'Direct Registered' : 'Reffered Registered',
//                        ($value->status == 'A') ? 'Active' : (($value->status == 'I') ? 'Inactive':'Deleted'),
                        $status,
                        $action
                    );
                }
            }
            echo json_encode($records, true);
        } else {
            return view('Admin::users.showUsers');
        }
    }

    public function getUsersMoreInstaDetails(Request $request)
    {
//        sleep(2);
        $id = $request->all()['userId'];
//        dd($id);
        $objUserModel = new User();
        $bindParams = [$id, $id, $id, $id, $id, $id];

        $query = "SELECT U.id,U.email,U.username,UM.user_type,UM.refferal_code,
                (SELECT count(ins_user_id) FROM instagram_users WHERE added_by_user_id =?) AS TCount,
                (SELECT count(ins_user_id) FROM instagram_users WHERE added_by_user_id =? and subscribe_type = 'PU') AS puCount,
                (SELECT count(ins_user_id) FROM instagram_users WHERE added_by_user_id =? and subscribe_type = 'BU') AS buCount,
                (SELECT count(ins_user_id) FROM instagram_users WHERE added_by_user_id =? and subscribe_type = 'DU') AS duCount
                 FROM users as U JOIN usersmeta as UM on U.id=UM.user_id
                 WHERE U.id IN(?,(select U1.reffered_user_id from users as U1 WHERE U1.id=?))";
//
//        $query = "SELECT U.id,U.email,U.username,UM.user_type,UM.refferal_code FROM users as U JOIN usersmeta as UM on U.id=UM.user_id
//                 WHERE U.id IN(?,(select U1.reffered_user_id from users as U1 WHERE U1.id=?))";
        $response = $objUserModel->getUsersDetails($query, $bindParams);
//        dd($response);

        $data = array();
        if (isset($response[0])) {
            if (count($response) == 2) {
                if ($response[0]->id == $id) {
                    $data['user_username'] = $response[0]->username;
                    $data['user_email'] = $response[0]->email;
                    $data['user_user_type'] = ($response[0]->user_type == 'PU') ? 'Paid User' : 'Demo User';
                    $data['affiliate_link'] = (!empty($response[0]->refferal_code)) ? env('WEB_URL') . '/refferalCode/' . $response[0]->refferal_code : 'Not Generated';
                    $data['reffered_email'] = $response[1]->email;

                    $data['total_insta_acc'] = $response[0]->TCount;
                    $data['total_priavte_acc'] = $response[0]->puCount;
                    $data['total_business_acc'] = $response[0]->buCount;
                    $data['total_demo_acc'] = $response[0]->duCount;
                } else {
                    $data['user_username'] = $response[1]->username;
                    $data['user_email'] = $response[1]->email;
                    $data['user_user_type'] = ($response[1]->user_type == 'PU') ? 'Paid User' : 'Demo User';
                    $data['affiliate_link'] = (!empty($response[1]->refferal_code)) ? env('WEB_URL') . '/refferalCode/' . $response[0]->refferal_code : 'Not Generated';
                    $data['reffered_email'] = $response[0]->email;

                    $data['total_insta_acc'] = $response[0]->TCount;
                    $data['total_priavte_acc'] = $response[0]->puCount;
                    $data['total_business_acc'] = $response[0]->buCount;
                    $data['total_demo_acc'] = $response[0]->duCount;
                }
            } else {
                $data['user_username'] = $response[0]->username;
                $data['user_email'] = $response[0]->email;
                $data['user_user_type'] = ($response[0]->user_type == 'PU') ? 'Paid User' : 'Demo User';
                $data['affiliate_link'] = (!empty($response[0]->refferal_code)) ? env('WEB_URL') . '/refferalCode/' . $response[0]->refferal_code : 'Not Generated';
                $data['reffered_email'] = 'User Directly Registered';

                $data['total_insta_acc'] = $response[0]->TCount;
                $data['total_priavte_acc'] = $response[0]->puCount;
                $data['total_business_acc'] = $response[0]->buCount;
                $data['total_demo_acc'] = $response[0]->duCount;
            }
        }
        return $data;
    }

    public function getInstaTimingDetails(Request $request)
    {

        dd('hellllo');
        //        sleep(2);
        $id = $request->all()['userId'];
//        dd($id);
        $objUserModel = new User();
        $bindParams = [$id, $id, $id, $id, $id, $id];

        $query = "SELECT U.id,U.email,U.username,UM.user_type,UM.refferal_code,
                (SELECT count(ins_user_id) FROM instagram_users WHERE added_by_user_id =?) AS TCount,
                (SELECT count(ins_user_id) FROM instagram_users WHERE added_by_user_id =? and subscribe_type = 'PU') AS puCount,
                (SELECT count(ins_user_id) FROM instagram_users WHERE added_by_user_id =? and subscribe_type = 'BU') AS buCount,
                (SELECT count(ins_user_id) FROM instagram_users WHERE added_by_user_id =? and subscribe_type = 'DU') AS duCount
                 FROM users as U JOIN usersmeta as UM on U.id=UM.user_id
                 WHERE U.id IN(?,(select U1.reffered_user_id from users as U1 WHERE U1.id=?))";
//
//        $query = "SELECT U.id,U.email,U.username,UM.user_type,UM.refferal_code FROM users as U JOIN usersmeta as UM on U.id=UM.user_id
//                 WHERE U.id IN(?,(select U1.reffered_user_id from users as U1 WHERE U1.id=?))";
        $response = $objUserModel->getUsersDetails($query, $bindParams);
//        dd($response);

        $data = array();
        if (isset($response[0])) {
            if (count($response) == 2) {
                if ($response[0]->id == $id) {
                    $data['user_username'] = $response[0]->username;
                    $data['user_email'] = $response[0]->email;
                    $data['user_user_type'] = ($response[0]->user_type == 'PU') ? 'Paid User' : 'Demo User';
                    $data['affiliate_link'] = (!empty($response[0]->refferal_code)) ? env('WEB_URL') . '/refferalCode/' . $response[0]->refferal_code : 'Not Generated';
                    $data['reffered_email'] = $response[1]->email;

                    $data['total_insta_acc'] = $response[0]->TCount;
                    $data['total_priavte_acc'] = $response[0]->puCount;
                    $data['total_business_acc'] = $response[0]->buCount;
                    $data['total_demo_acc'] = $response[0]->duCount;
                } else {
                    $data['user_username'] = $response[1]->username;
                    $data['user_email'] = $response[1]->email;
                    $data['user_user_type'] = ($response[1]->user_type == 'PU') ? 'Paid User' : 'Demo User';
                    $data['affiliate_link'] = (!empty($response[1]->refferal_code)) ? env('WEB_URL') . '/refferalCode/' . $response[0]->refferal_code : 'Not Generated';
                    $data['reffered_email'] = $response[0]->email;

                    $data['total_insta_acc'] = $response[0]->TCount;
                    $data['total_priavte_acc'] = $response[0]->puCount;
                    $data['total_business_acc'] = $response[0]->buCount;
                    $data['total_demo_acc'] = $response[0]->duCount;
                }
            } else {
                $data['user_username'] = $response[0]->username;
                $data['user_email'] = $response[0]->email;
                $data['user_user_type'] = ($response[0]->user_type == 'PU') ? 'Paid User' : 'Demo User';
                $data['affiliate_link'] = (!empty($response[0]->refferal_code)) ? env('WEB_URL') . '/refferalCode/' . $response[0]->refferal_code : 'Not Generated';
                $data['reffered_email'] = 'User Directly Registered';

                $data['total_insta_acc'] = $response[0]->TCount;
                $data['total_priavte_acc'] = $response[0]->puCount;
                $data['total_business_acc'] = $response[0]->buCount;
                $data['total_demo_acc'] = $response[0]->duCount;
            }
        }
        return $data;

    }

    public function updateUserStatus(Request $request)
    {
        try {
            $postData = $request->all();
            $user_id = $postData['user_id'];
            $status = $postData['user_status'];
            $objUserModel = new User();

            if ($status == 'A') {
                $updated_data = ['status' => 'A'];
            } else if ($status == 'I') {
                $updated_data = ['status' => 'I'];
            } else if ($status == 'D') {
                $updated_data = ['status' => 'D'];
            } else {
                return 0;
            }

            $result = $objUserModel->updateUserStatus($user_id, $updated_data);
            if ($result) {
                return 1;
            }
        } catch (\Exception $e) {
            return 0;
//            return $e->getMessage();
        }
        return 0;
    }

    public function userInstagramAccounts(Request $request)
    {
        if ($request->isMethod('post')) {
            $objUserModel = new User();
            $postData = $request->all();

            $iTotalRecords = $iDisplayLength = intval($postData['length']);
            $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
            $iDisplayStart = intval($postData['start']);
            $sEcho = intval($postData['draw']);

            $iTotalRecords = $objUserModel->getFilteredUsersInstaAccount(0, 0, 0, -2);
            $iTotalFilteredRecords = $iTotalRecords;

            $columns = array(
                'instagram_users.ins_user_id',
                'instagram_users.username',
                'users.email',
                'instagram_users.created_at',
                'login_details.is_user_disconnected',
                'instagram_users.status',
                'instagram_users.subscribe_type'
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
                    $filteringRules[] = "( instagram_users.ins_user_id LIKE '%" . $postData['id'] . "%' )";
                }
                if ($postData['username'] != '') {
                    $filteringRules[] = "( instagram_users.username LIKE '%" . $postData['username'] . "%' )";
                }
                if ($postData['email'] != '') {
                    $filteringRules[] = "( users.email LIKE '%" . $postData['email'] . "%' )";
                }

                if ($postData['connected'] != '') {
                    $filteringRules[] = "( login_details.is_user_disconnected LIKE '%" . $postData['connected'] . "%' )";
                }
                if ($postData['added_date'] != '') {
                    $filteringRules[] = "( instagram_users.created_at LIKE '%" . $postData['added_date'] . "%' )";
                }
                if ($postData['status'] != '') {
                    $filteringRules[] = "( instagram_users.status LIKE '%" . $postData['status'] . "%' )";
                }
                if ($postData['sub_type'] != '') {
                    $filteringRules[] = "( instagram_users.subscribe_type LIKE '%" . $postData['sub_type'] . "%' )";
                }

                if (!empty($filteringRules)) {
//                    $whereUserById['rawQuery'] .= " AND " . implode(" AND ", $filteringRules);
                    $whereUserById['rawQuery'] = implode(" AND ", $filteringRules);
                }
                $iTotalFilteredRecords = $objUserModel->getFilteredUsersInstaAccount($whereUserById, $sortingOrder, $iDisplayStart, -2);
            }

            $result = $objUserModel->getFilteredUsersInstaAccount($whereUserById, $sortingOrder, $iDisplayStart, $iDisplayLength);
            $records["data"] = array();
            $records["draw"] = $sEcho;
            $records["recordsTotal"] = $iTotalRecords;
            $records["recordsFiltered"] = $iTotalFilteredRecords;

            if (!empty($result)) {
                foreach ($result as $key => $value) {
                    $action = '<button class="btn btn-sm blue viewMore margin-bottom" id ="view' . $value->ins_user_id . '" data-id="' . $value->ins_user_id . '"></i> View More</button>';
                    $records['data'][] = array(
                        $value->ins_user_id,
                        $value->username,
                        $value->email,
                        date('d/m/Y', $value->created_at),
                        ($value->is_user_disconnected == 'N') ? 'YES' : 'NO',
                        ($value->status == 'A') ? 'Active' : 'Inactive',
                        ($value->subscribe_type == 'DU') ? 'Demo User' : (($value->subscribe_type == 'PU') ? 'Private User' : 'Business User'),
                        $action
                    );
                }
            }
            echo json_encode($records, true);
        } else {
            return view('Admin::users.userInstagramAccounts');
        }
    }

    public function activityStats1(Request $request)
    {

        try {
            $id = $request->all()['userId'];

            $objUserModel = new User();
            $bindParams = [$id];

            $selectColumn = '
            ACS.total_time_used,
            ACS.insta_follows_count,
            ACS.default_likes_count,
            ACS.default_follows_count,
            ACS.default_followers_count,
            ACS.default_unfollows_count,

            ACS.filter_likes_count,
            ACS.filter_follows_count,
            ACS.filter_followers_count,
            ACS.filter_unfollows_count,

            IU.full_name,
            IU.username,
            IU.profile_pic_url,
            IU.gender,
            IU.status,
            IU.total_subscription_time,
            IU.time_period_left,
            IU.start_date,
            IU.stop_date,
            IU.stop_reason
            ';
            $dbQuery = 'SELECT ' . $selectColumn . ' from activity_stats as ACS
            JOIN instagram_users as IU on ACS.for_instagram_user_id=IU.ins_user_id
            where for_instagram_user_id=?';

            $response = $objUserModel->getActivityStatistics($dbQuery, $bindParams);
//        dd('$response',$response);

            $data = array();
            if (isset($response[0])) {


//            $time=$this->convertDateTimeFormat();


                $data['total_time_used'] = $this->convertDateTimeFormat($response[0]->total_time_used);
                $data['time_period_left'] = $this->convertDateTimeFormat($response[0]->time_period_left);
                $data['start_date'] = (!empty($response[0]->start_date)) ? date('d/M/Y', $response[0]->start_date) : 'yet to start';
                $data['stop_date'] = (!empty($response[0]->stop_date)) ? date('d/M/Y', $response[0]->stop_date) : 'yet to start';
                $data['total_subscription_time'] = $this->convertDateTimeFormat($response[0]->total_subscription_time);

                $data['admin_insta_follows_count'] = $response[0]->insta_follows_count;

                $data['default_likes_count'] = $response[0]->default_likes_count;
                $data['default_follows_count'] = $response[0]->default_follows_count;
                $data['default_followers_count'] = $response[0]->default_followers_count;
                $data['default_unfollows_count'] = $response[0]->default_unfollows_count;

                $data['filter_likes_count'] = $response[0]->filter_likes_count;
                $data['filter_follows_count'] = $response[0]->filter_follows_count;
                $data['filter_followers_count'] = $response[0]->filter_followers_count;
                $data['filter_unfollows_count'] = $response[0]->filter_unfollows_count;

                $data['full_name'] = $response[0]->full_name;
                $data['username'] = $response[0]->username;
                $data['profile_pic_url'] = $response[0]->profile_pic_url;
                $data['gender'] = ($response[0]->gender == 1) ? 'Male' : (($response[0]->gender == 2) ? 'Female' : 'unknown');
                $data['status'] = ($response[0]->status == 'A') ? 'Started' : 'Stopped';

                $data['stop_reason'] = (!empty($response[0]->stop_reason)) ? $response[0]->stop_reason : 'NA';
            }
            return $data;
        } catch (\Exception $e) {
            return $e;

        }
    }
    public function activityStats(Request $request)
    {
        try {
            $id = $request->all()['userId'];
            $objUserModel = new User();
            $response = $objUserModel->getActivityStatistics($id);
            $data = array();
            if (isset($response[0])) {
                $data['current_promotion_status'] = ($response[0]->current_promotion_status==0) ? 'Stopped' : 'Running';
                $data['current_promotion_type'] = ($response[0]->current_promotion_type=='D') ? 'Default' : 'Filter';

                $data['default_gender_filter'] = ($response[0]->default_gender_filter==1) ? 'Male' : (($response[0]->default_gender_filter==2) ?'Female':'Both');
                $data['default_promotion_status'] = ($response[0]->default_promotion_status==1) ? 'Stopped' : 'Running';
                $data['default_promotion_start_time'] = $response[0]->default_promotion_start_time;
                $data['default_promotion_stop_time'] = $response[0]->default_promotion_stop_time;

                $data['like'] = ($response[0]->like==1) ? 'ON' : 'OFF';
                $data['follow'] = ($response[0]->follow==1) ?  'ON' : 'OFF';
                $data['unfollow'] = ($response[0]->unfollow==1) ?  'ON' : 'OFF';
                $data['filter_gender'] = ($response[0]->gender==1) ?  'Male' : (($response[0]->gender==2)?'Female':'Not Specified');
                $data['unfollow_option'] = ($response[0]->unfollow_option==1) ? 'Unfollow after 2 Days' : (($response[0]->unfollow_option==2)?'Unfollow after 1000 Follows':'Default');
//                $data['media_type'] = $this->convertDateTimeFormat($response[0]->total_subscription_time);
                $data['media_type'] = ($response[0]->media_type=='I') ? 'Image' : (($response[0]->media_type=='V') ?'Video':'Any');
                $data['filter_promotion_status'] = ($response[0]->filter_promotion_status==1) ? 'Running' : 'Stopped';

                $data['filter_promotion_start_time'] = $response[0]->filter_promotion_start_time;
                $data['filter_promotion_stop_time'] = $response[0]->filter_promotion_stop_time;


                $data['total_time_used'] = $this->convertDateTimeFormat($response[0]->total_time_used);
                $data['time_period_left'] = $this->convertDateTimeFormat($response[0]->time_period_left);
                $data['start_date'] = (!empty($response[0]->start_date)) ? date('d/M/Y', $response[0]->start_date) : 'yet to start';
                $data['stop_date'] = (!empty($response[0]->stop_date)) ? date('d/M/Y', $response[0]->stop_date) : 'yet to start';
                $data['total_subscription_time'] = $this->convertDateTimeFormat($response[0]->total_subscription_time);

                $data['admin_insta_follows_count'] = $response[0]->insta_follows_count;

                $data['default_likes_count'] = $response[0]->default_likes_count;
                $data['default_follows_count'] = $response[0]->default_follows_count;
                $data['default_followers_count'] = $response[0]->default_followers_count;
                $data['default_unfollows_count'] = $response[0]->default_unfollows_count;

                $data['filter_likes_count'] = $response[0]->filter_likes_count;
                $data['filter_follows_count'] = $response[0]->filter_follows_count;
                $data['filter_followers_count'] = $response[0]->filter_followers_count;
                $data['filter_unfollows_count'] = $response[0]->filter_unfollows_count;

                $data['full_name'] = $response[0]->full_name;
                $data['username'] = $response[0]->username;
                $data['profile_pic_url'] = $response[0]->profile_pic_url;
                $data['gender'] = ($response[0]->gender == 1) ? 'Male' : (($response[0]->gender == 2) ? 'Female' : 'unknown');
                $data['status'] = ($response[0]->status == 'A') ? 'Started' : 'Stopped';

                $data['stop_reason'] = (!empty($response[0]->stop_reason)) ? $response[0]->stop_reason : 'NA';

//                dd($data);
            }
            return $data;
        } catch (\Exception $e) {
            return [];

        }
    }

    public function prefix($value)
    {
        return ($value > 1) ? 's' : '';
    }


    function convertDateTimeFormat($sec)
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

    public function getPendingUsers(Request $request)
    {

        if ($request->isMethod('post')) {
            $objUserModel = new User();
            $postData = $request->all();

            $iTotalRecords = $iDisplayLength = intval($postData['length']);
            $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
            $iDisplayStart = intval($postData['start']);
            $sEcho = intval($postData['draw']);

            $iTotalRecords = $objUserModel->getFilteredPendingUsers(0, 0, 0, -2);
            $iTotalFilteredRecords = $iTotalRecords;
            $columns = array(
                'id',
                'email',
                'created_at',
                'status',
                'register_type',
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
                    $filteringRules[] = "( id LIKE '%" . $postData['id'] . "%' )";
                }
                if ($postData['email'] != '') {
                    $filteringRules[] = "( email LIKE '%" . $postData['email'] . "%' )";
                }
                if ($postData['reg_date'] != '') {
                    $filteringRules[] = "( created_at LIKE '%" . $postData['reg_date'] . "%' )";
                }

                if ($postData['reg_type'] != '') {
                    $filteringRules[] = "( register_type LIKE '%" . $postData['reg_type'] . "%' )";
                }

                if (!empty($filteringRules)) {
                    $whereUserById['rawQuery'] = implode(" AND ", $filteringRules);
                }

                $iTotalFilteredRecords = $objUserModel->getFilteredPendingUsers($whereUserById, $sortingOrder, $iDisplayStart, -2);
            }
            $result = $objUserModel->getFilteredPendingUsers($whereUserById, $sortingOrder, $iDisplayStart, $iDisplayLength);

            $records["data"] = array();
            $records["draw"] = $sEcho;
            $records["recordsTotal"] = $iTotalRecords;
            $records["recordsFiltered"] = $iTotalFilteredRecords;

            if (!empty($result)) {
                foreach ($result as $key => $value) {
                    $action = '<a class="btn btn-sm red delete_acc" data-id="' . $value->id . '"><i class="fa fa-trash"></i>Remove User</a>';
                    $records['data'][] = array(
                        $value->id,
                        $value->email,
                        date('d/m/Y', $value->created_at),
                        ($value->status == 'P') ? 'Pending' : 'Unknown',
                        ($value->register_type == 'DR') ? 'Direct Registered' : 'Reffered Registered',
                        $action
                    );
                }
            }
            echo json_encode($records, true);
        } else {
            return view('Admin::users.pendingUsers');
        }
    }

    public function deletePendingUsers(Request $request)
    {

        try {

            $removeId = $request->all()['removeId'];
            $objUserModel = new User();
            $result = $objUserModel->removePendingUserAccount($removeId);
            if ($result) {
                return 1;
            }
            return 0;
        } catch (\Exception $e) {
            return 0;

        }


    }

    public function showAffiliateUsers(Request $request)
    {
        if ($request->isMethod('post')) {
            $objUserModel = new User();
            $postData = $request->all();
//                   dd($postData);
//
            $iTotalRecords = $iDisplayLength = intval($postData['length']);
            $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
            $iDisplayStart = intval($postData['start']);
            $sEcho = intval($postData['draw']);

            $iTotalRecords = $objUserModel->getFilteredAffiliateUsers(0, 0, 0, -2);
            $iTotalFilteredRecords = $iTotalRecords;

            $columns = array(
                'users.id',
                'users.email',
                'users.created_at',
                'users.status',
                'usersmeta.user_type',
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
                    $filteringRules[] = "( users.id LIKE '%" . $postData['id'] . "%' )";
                }
                if ($postData['email'] != '') {
                    $filteringRules[] = "( users.email LIKE '%" . $postData['email'] . "%' )";
                }
                if ($postData['reg_date'] != '') {
                    $filteringRules[] = "( users.created_at LIKE '%" . $postData['reg_date'] . "%' )";
                }

                if ($postData['status'] != '') {
                    $filteringRules[] = "( users.status LIKE '%" . $postData['status'] . "%' )";
                }
                if ($postData['sub_type'] != '') {
                    $filteringRules[] = "( usersmeta.user_type LIKE '%" . $postData['sub_type'] . "%' )";
                }

                if (!empty($filteringRules)) {

                    $whereUserById['rawQuery'] = implode(" AND ", $filteringRules);
                }

                $iTotalFilteredRecords = $objUserModel->getFilteredAffiliateUsers($whereUserById, $sortingOrder, $iDisplayStart, -2);
            }

            $result = $objUserModel->getFilteredAffiliateUsers($whereUserById, $sortingOrder, $iDisplayStart, $iDisplayLength);

            $records["data"] = array();
            $records["draw"] = $sEcho;
            $records["recordsTotal"] = $iTotalRecords;
            $records["recordsFiltered"] = $iTotalFilteredRecords;

            if (!empty($result)) {
                foreach ($result as $key => $value) {
                    $action = '<button class="btn btn-sm blue viewMoreAff margin-bottom" id ="view' . $value->id . '" data-id="' . $value->id . '"></i> View More</button>';
                    $records['data'][] = array(
                        $value->id,
                        $value->email,
                        date('d/m/Y', $value->created_at),
                        ($value->status == 'A') ? 'Active' : (($value->status == 'I') ? 'Inactive' : 'Deleted'),
                        ($value->user_type == 'DU') ? 'Demo User' : 'Paid User',
                        $action
                    );
                }
            }
            echo json_encode($records, true);
        } else {
            return view('Admin::users.showAffiliateUsers');
        }
    }

    public function getUsersMoreAffiliateDetails(Request $request)
    {
        //        sleep(2);
        $id = $request->all()['userId'];

        $objUserModel = new User();
        $bindParams = [$id, $id, $id, $id];

        $query = "SELECT UM.refferal_code,(SELECT  count(U.id) from users as U JOIN usersmeta as UM on UM.user_id=U.id where UM.user_type='PU' and U.register_type='RR' and U.id=?) as total_paid_count,
              (SELECT  count(U.id) from users as U where U.register_type='RR' and U.id=?) as total_aff_count,
              (SELECT  count(U.id) from users as U JOIN usersmeta as UM on UM.user_id=U.id where UM.user_type='DU' and U.register_type='RR' and U.id=?) as total_demo_count
              FROM usersmeta as UM  WHERE UM.user_id =?";


        $response = $objUserModel->getAffliateDetails($query, $bindParams);
//        dd($response);

        $data = array();
        if (isset($response[0])) {

            $data['total_paid_count'] = $response[0]->total_paid_count;
            $data['total_aff_count'] = $response[0]->total_aff_count;
            $data['total_demo_count'] = $response[0]->total_demo_count;
            $data['affiliate_link'] = (!empty($response[0]->refferal_code)) ? env('WEB_URL') . '/refferalCode/' . $response[0]->refferal_code : 'Not Generated';

        }
        return $data;
    }

    public function usersPaymentHistory(Request $request)
    {

        if ($request->isMethod('post')) {

            $objUserModel = new User();
            $postData = $request->all();

            $iTotalRecords = $iDisplayLength = intval($postData['length']);
            $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
            $iDisplayStart = intval($postData['start']);
            $sEcho = intval($postData['draw']);

            $iTotalRecords = $objUserModel->getFilteredUsersPaymentHistory(0, 0, 0, -2);
            $iTotalFilteredRecords = $iTotalRecords;

            $columns = array(
                'transactions.transaction_id',
                'transactions.txn_id',
//                'transactions.payer_email',
                'users.email',
                'transactions.quantity',
                'transactions.amount',
                'transactions.created_at',
                'transactions.txn_status',
                'users.register_type',
                'transactions.payment_time',
//                'transactions.currency_code',
                'transactions.payment_mode',
            );

            //Displaying records based on sorting orders
            $sortingOrder = "";
            if (isset($postData['order'])) {
                $sortingOrder = [$columns[$postData['order'][0]['column']], $postData['order'][0]['dir']];
            }
            //FIRLTERING START FROM HERE
            $filteringRules = '';
            $whereUserById = array();
//            dd($postData);
            if (isset($postData['action']) && $postData['action'] == 'filter' && $postData['action'][0] != 'filter_cancel') {

                if ($postData['id'] != '') {
                    $filteringRules[] = "( transactions.transaction_id LIKE '%" . $postData['id'] . "%' )";
                }
                if ($postData['t_id'] != '') {
                    $filteringRules[] = "( transactions.txn_id LIKE '%" . $postData['t_id'] . "%' )";
                }
                if ($postData['p_type'] != '') {
                    $filteringRules[] = "( users.register_type LIKE '%" . $postData['p_type'] . "%' )";
                }
//                if ($postData['p_email'] != '') {
//                    $filteringRules[] = "( transactions.payer_email LIKE '%" . $postData['p_email'] . "%' )";
//                }

                if ($postData['i_email'] != '') {
                    $filteringRules[] = "( users.email LIKE '%" . $postData['i_email'] . "%' )";
                }
                if ($postData['quantity'] != '') {
                    $filteringRules[] = "( transactions.quantity LIKE '%" . $postData['quantity'] . "%' )";
                }
                if ($postData['status'] != '') {
                    $filteringRules[] = "( transactions.txn_status LIKE '%" . $postData['status'] . "%' )";
                }
                if ($postData['amount'] != '') {
                    $filteringRules[] = "( transactions.amount LIKE '%" . $postData['amount'] . "%' )";
                }
                if ($postData['date'] != '') {
                    $filteringRules[] = "( transactions.created_at LIKE '%" . $postData['date'] . "%' )";
                }

                if (!empty($filteringRules)) {
//                    $whereUserById['rawQuery'] .= " AND " . implode(" AND ", $filteringRules);
                    $whereUserById['rawQuery'] = implode(" AND ", $filteringRules);
                }
                $iTotalFilteredRecords = $objUserModel->getFilteredUsersPaymentHistory($whereUserById, $sortingOrder, $iDisplayStart, -2);
            }

            $result = $objUserModel->getFilteredUsersPaymentHistory($whereUserById, $sortingOrder, $iDisplayStart, $iDisplayLength);
            $records["data"] = array();
            $records["draw"] = $sEcho;
            $records["recordsTotal"] = $iTotalRecords;
            $records["recordsFiltered"] = $iTotalFilteredRecords;


            if (!empty($result)) {
                foreach ($result as $key => $value) {
                    $action = '<button class="btn btn-sm blue viewMore margin-bottom" id ="view' . $value->transaction_id . '" data-id="' . $value->transaction_id . '"></i> View Details</button>';
                    $paymentMode = ($value->payment_mode == "P") ? '<i class="fa fa-paypal" style="color: green; margin-left: 15px;">aypal</i>' : '<i class="fa fa-credit-card" style="color: green; margin-left: 15px;"></i>';
                    $records['data'][] = array(
                        $value->transaction_id,
                        (!empty($value->txn_id))?$value->txn_id:'NA',
//                        (!empty($value->payer_email)) ? $value->payer_email : 'NA',
                        $value->email,
                        $value->quantity,
                        $value->amount,
                        date('d/m/Y', $value->created_at),
//                        $value->txn_status,
                        ($value->txn_status=='C')?'Created':(($value->txn_status=='S')?'Success':(($value->txn_status=='P')?'Pending':'Failed')),
                        ($value->register_type == 'DR') ? 'Direct Payment' : 'Reffered Payment',
                        $paymentMode,
                        $action
                    );
                }
            }
            echo json_encode($records, true);
        } else {
            return view('Admin::users.paymentHistory');
        }
    }

    public function getPaymentListInfo(Request $request)
    {
        $id = $request->all()['viewId'];
        $objUserModel = new User();
        $bindParams = [$id];
        $response = $objUserModel->getPaymentDetails($bindParams);
        $data = array();
        try {
            if (!empty($response[0])) {
                if (!empty($response[0]->paymentInfoList)) {
                    $paymentInfo = json_decode($response[0]->paymentInfoList);

                    (!empty($paymentInfo->senderEmail)) ? $data['senderEmail'] = $paymentInfo->senderEmail : $data['senderEmail'] = 'NA';
                    (!empty($paymentInfo->status)) ? $data['status'] = $paymentInfo->status : $data['status'] = 'NA';
                    (!empty($paymentInfo->payKey)) ? $data['payKey'] = $paymentInfo->payKey : $data['payKey'] = 'NA';

                    if (!empty($paymentInfo->paymentInfoList)) {
                        $paymentInfoList = $paymentInfo->paymentInfoList;
                        if (!empty($paymentInfoList->paymentInfo)) {
                            if (!empty($paymentInfoList->paymentInfo[0])) {
                                $infoList = $paymentInfoList->paymentInfo[0];
                                (!empty($infoList->transactionId)) ? $data['transactionId'] = $infoList->transactionId : $data['transactionId'] = 'NA';
                                (!empty($infoList->transactionStatus)) ? $data['transactionStatus'] = $infoList->transactionStatus : $data['transactionStatus'] = 'NA';
                                (!empty($infoList->senderTransactionId)) ? $data['senderTransactionId'] = $infoList->senderTransactionId : $data['senderTransactionId'] = 'NA';
                                (!empty($infoList->senderTransactionStatus)) ? $data['senderTransactionStatus'] = $infoList->senderTransactionStatus : $data['senderTransactionStatus'] = 'NA';
                                if (!empty($infoList->receiver)) {
                                    (!empty($infoList->receiver->amount)) ? $data['receiverAmount'] = $infoList->receiver->amount : $data['receiverAmount'] = 'NA';
                                    (!empty($infoList->receiver->email)) ? $data['receiverEmail'] = $infoList->receiver->email : $data['receiverEmail'] = 'NA';
                                }
                            }
                            if (!empty($paymentInfoList->paymentInfo[1])) {
                                $infoList = $paymentInfoList->paymentInfo[1];
                                (!empty($infoList->transactionId)) ? $data['aff_transactionId'] = $infoList->transactionId : $data['aff_transactionId'] = 'NA';
                                (!empty($infoList->transactionStatus)) ? $data['aff_transactionStatus'] = $infoList->transactionStatus : $data['aff_transactionStatus'] = 'NA';
                                (!empty($infoList->senderTransactionId)) ? $data['aff_senderTransactionId'] = $infoList->senderTransactionId : $data['aff_senderTransactionId'] = 'NA';
                                (!empty($infoList->senderTransactionStatus)) ? $data['aff_senderTransactionStatus'] = $infoList->senderTransactionStatus : $data['aff_senderTransactionStatus'] = 'NA';
                                if (!empty($infoList->receiver)) {
                                    (!empty($infoList->receiver->amount)) ? $data['aff_receiverAmount'] = $infoList->receiver->amount : $data['aff_receiverAmount'] = 'NA';
                                    (!empty($infoList->receiver->email)) ? $data['aff_receiverEmail'] = $infoList->receiver->email : $data['aff_receiverEmail'] = 'NA';
                                }
                            }
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            return [];
        }
        return $data;
    }


}