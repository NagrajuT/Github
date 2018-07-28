<?php namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Models\Admin;
use App\Modules\Admin\Models\User;
use App\Modules\Admin\Models\PromotionDefaults;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use yajra\Datatables\Datatables;

class ManageAffiliateController extends Controller
{
    public function showAffiliateSubscriptions(Request $request)
    {


        if ($request->isMethod('post')) {

            $objUserModel = new User();
            $postData = $request->all();


            $iTotalRecords = $iDisplayLength = intval($postData['length']);
            $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
            $iDisplayStart = intval($postData['start']);
            $sEcho = intval($postData['draw']);

            $iTotalRecords = $objUserModel->getFilteredAffiliatePaymentHistory(0, 0, 0, -2);
//            $iTotalRecords = $objUserModel->getAllUsers();
            $iTotalFilteredRecords = $iTotalRecords;

            $columns = array(
                'AUP.affiliate_user_payments_id',
                'U.email',
                'U1.email',
                'AUP.total_amount',
                'AUP.affiliate_amount',
                'AUP.created_at',
                'AUP.claim_status',
                'AUP.claim_date',
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
                    $filteringRules[] = "( AUP.affiliate_user_payments_id LIKE '%" . $postData['id'] . "%' )";
                }
                if ($postData['payer_email'] != '') {
                    $filteringRules[] = "( U.email LIKE '%" . $postData['payer_email'] . "%' )";
                }
                if ($postData['referred_email'] != '') {
                    $filteringRules[] = "( U1.email  LIKE '%" . $postData['referred_email'] . "%' )";
                }
                if ($postData['total_amount'] != '') {
                    $filteringRules[] = "( AUP.total_amount  LIKE '%" . $postData['total_amount'] . "%' )";
                }
                if ($postData['claim_amount'] != '') {
                    $filteringRules[] = "( AUP.affiliate_amount  LIKE '%" . $postData['claim_amount'] . "%' )";
                }
                if ($postData['purchage_date'] != '') {
                    $filteringRules[] = "( AUP.created_at  LIKE '%" . $postData['purchage_date'] . "%' )";
                }
                if ($postData['claim_date'] != '') {
                    $filteringRules[] = "( AUP.claim_date  LIKE '%" . $postData['claim_date'] . "%' )";
                }

                if ($postData['claim_status'] != '') {
                    $filteringRules[] = "( AUP.claim_status LIKE '%" . $postData['claim_status'] . "%' )";
                }

                if (!empty($filteringRules)) {
                    $whereUserById['rawQuery'] = implode(" AND ", $filteringRules);
                }
                $iTotalFilteredRecords = $objUserModel->getFilteredAffiliatePaymentHistory($whereUserById, $sortingOrder, $iDisplayStart, -2);
            }


            $result = $objUserModel->getFilteredAffiliatePaymentHistory($whereUserById, $sortingOrder, $iDisplayStart, $iDisplayLength);

            $records["data"] = array();
            $records["draw"] = $sEcho;
            $records["recordsTotal"] = $iTotalRecords;

            $records["recordsFiltered"] = $iTotalFilteredRecords;

            if (!empty($result)) {
                foreach ($result as $key => $value) {
                    $action = '';

                    $records['data'][] = array(
                        $value->affiliate_user_payments_id,
                        $value->userEmail,
                        $value->referredEmail,
                        $value->total_amount.' ILS',
                        $value->affiliate_amount.' ILS',
                        (date('d/m/Y',$value->created_at)),
                        (!empty($value->claim_date))?(date('d/m/Y',$value->claim_date)):'NA',
                        ($value->claim_status==0)?'Not Claimed':(($value->claim_status===1)?'Claim Pending':'Claimed'),
                        $action
                    );
                }
            }
            echo json_encode($records, true);
        } else {
            return view('Admin::users.affiliatePaymentHistory');
        }
    }
    public function affilateClaimHistory(Request $request)
    {

        if ($request->isMethod('post')) {

            $objUserModel = new User();
            $postData = $request->all();

            $iTotalRecords = $iDisplayLength = intval($postData['length']);
            $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
            $iDisplayStart = intval($postData['start']);
            $sEcho = intval($postData['draw']);

            $iTotalRecords = $objUserModel->getFilteredAffiliateClaimtHistory(0, 0, 0, -2);
//            $iTotalRecords = $objUserModel->getAllUsers();
            $iTotalFilteredRecords = $iTotalRecords;

            $columns = array(
                'APH.affiliate_claim_history_id',
                'APH.claim_amount',
                'APH.admin_view_status',
                'APH.claim_status',
                'APH.claim_status_message',
                'U.email',
                'APH.created_at',
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
                if ($postData['referral_email'] != '') {
                    $filteringRules[] = "(U.email LIKE '%" . $postData['referral_email'] . "%' )";
                }

                if ($postData['claim_amount'] != '') {
                    $filteringRules[] = "( APH.claim_amount LIKE '%" . $postData['claim_amount'] . "%' )";
                }
                if ($postData['short_info'] != '') {
                    $filteringRules[] = "( APH.claim_status_message LIKE '%" . $postData['short_info'] . "%' )";
                }
                if ($postData['claim_date'] != '') {
                    $filteringRules[] = "( APH.created_at LIKE '%" . $postData['claim_date'] . "%' )";
                }
                if ($postData['claim_time'] != '') {
                    $filteringRules[] = "( APH.created_at LIKE '%" . $postData['claim_time'] . "%' )";
                }
                if ($postData['status'] != '') {
                    $filteringRules[] = "( APH.claim_status LIKE '%" . $postData['status'] . "%' )";
                }

                if (!empty($filteringRules)) {
                    $whereUserById['rawQuery'] = implode(" AND ", $filteringRules);
                }
                $iTotalFilteredRecords = $objUserModel->getFilteredAffiliateClaimtHistory($whereUserById, $sortingOrder, $iDisplayStart, -2);
            }


            $result = $objUserModel->getFilteredAffiliateClaimtHistory($whereUserById, $sortingOrder, $iDisplayStart, $iDisplayLength);
//            dd($result);

            $records["data"] = array();
            $records["draw"] = $sEcho;
            $records["recordsTotal"] = $iTotalRecords;

            $records["recordsFiltered"] = $iTotalFilteredRecords;

            if (!empty($result)) {
                foreach ($result as $key => $value) {
//                    $status = '<div class="btn-group">';
//                    if ($value->status == 'A') {
//                        $status .= '<button class="btn btn-sm green-meadow  margin-bottom dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" data-id="' . $value->id . '">';
//                        $status .= 'Active';
//                        $status .= '&nbsp <i class="fa fa-angle-down"></i></button>';
//                        $status .= '<ul class="dropdown-menu" role="menu">
//                                    <li class="user_status"><a href="javascript:;" data-status="I">Inactive</a></li>
//                                    <li class="user_status"><a href="javascript:;" data-status="D">Deleted</a></li>
//                                 </ul>';
//                    }
//                    else if ($value->status == 'I') {
//                        $status .= '<button class="btn btn-sm yellow-casablanca  margin-bottom dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" data-id="' . $value->id . '">';
//
//                        $status .= 'Inactive';
//                        $status .= '&nbsp<i class="fa fa-angle-down"></i></button>';
//                        $status .= '<ul class="dropdown-menu" role="menu">
//                                    <li class="user_status"><a href="javascript:;" data-status="A">Active</a></li>
//                                    <li class="user_status"><a href="javascript:;" data-status="D">Deleted</a></li>
//                                 </ul>';
//                    }
//                    else {
//                        $status .= '<button class="btn btn-sm red-thunderbird margin-bottom dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" data-id="' . $value->id . '">';
//                        $status .= 'Deleted';
//                        $status .= '&nbsp<i class="fa fa-angle-down"></i></button>';
//                        $status .= '<ul class="dropdown-menu" role="menu">
//                                   <li class="user_status"><a href="javascript:;" data-status="A">Active</a></li>
//                                    <li class="user_status"><a href="javascript:;" data-status="I">Inactive</a></li>
//                                 </ul>';
//                    }
//
//                    $status .= '</div>';

                    $checkData='';
                    $action='';
                    if($value->claim_status=='P'||$value->claim_status=='F'){
//                        $action = '<button class="btn btn-sm blue viewMore margin-bottom" id ="view' . $value->affiliate_claim_history_id . '" data-id="' . $value->affiliate_claim_history_id . '"></i>make payment</button>';
                        $action = '';
                        $checkData='<input type="checkbox" class="checkboxes" value="'.$value->affiliate_claim_history_id.'"/>';
                    }
                    $claimAmount='<span class="claimAmt" data-amount="'.$value->claim_amount.'">'.$value->claim_amount.' ILS</span>';

                    $records['data'][] = array(
                        $checkData,
                        $value->affiliate_claim_history_id,
                        $value->email,
                        $claimAmount,
//                        $value->claim_amount.' ILS',
                        $value->claim_status_message,
                        date('d/m/Y',$value->created_at),
                        date('h:i:s A',$value->created_at),
                        ($value->claim_status=='P')?'Pending':(($value->claim_status=='PR')?'Processing':(($value->claim_status=='S')?'Success':'Failed')),
                        $action
                    );
                }
            }
            echo json_encode($records, true);
        } else {
            return view('Admin::users.affiliateClaimHistory');
        }
    }

}