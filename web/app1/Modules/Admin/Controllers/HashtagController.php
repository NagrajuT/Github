<?php namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Models\User;

use Illuminate\curl\CurlRequestHandler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HashtagController extends Controller
{

    public function showDefaultHashtag1(Request $request)
    {
        $objUserModel = new User();
        $results = $objUserModel->getDefaultHashtag(1);
        dd($results);
        if ($request->isMethod('post')) {

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
            return view('Admin::users.showDefaultHashtag');
        }
    }

    public function showDefaultHashtag(Request $request)
    {

        $where = [];
        $data = [];
        $objUserModel = new User();

        if ($request->isMethod('post')) {
            if (!empty($request->query('search'))) {
                $where['rawQuery'] = "( default_hashtags_list.hashtag_contents LIKE '%" . $request->query('search') . "%' )";
                $results = $objUserModel->getDefaultHashtag($where);
                $results->appends($request->only('search'))->links();

                $htmlData = $this->makeDynamicHtml($results);
                $data['htmlData'] = $htmlData;
                $data['htmlLinks'] = '' . $results->links();
                return response($data);

            }
            $results = $objUserModel->getDefaultHashtag($where);
            $htmlData = $this->makeDynamicHtml($results);
            $data['htmlData'] = $htmlData;
            $data['htmlLinks'] = '' . $results->links();
            return response($data);

        }
        return view('Admin::users.showDefaultHashtag');
    }

    public function addNewDefaultHashtag(Request $request)
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


    function makeDynamicHtml($data)
    {

        $htmlData = '';
        foreach ($data as $user) {

            $activeStatus = ($user->hashtag_status == 'A') ? 'Inactive' : 'Active';
            $colorStatus = ($user->hashtag_status == 'A') ? 'hash-color' : 'yellow-casablanca';
            $htmlData .= '<div class="btn-group">
                                <button class="btn ' . $colorStatus . '" type="button">' . $user->hashtag_contents . '</button>
                                <button data-toggle="dropdown" class="btn dropdown-toggle ' . $colorStatus . '" type="button">
                                <i class="fa fa-angle-down"></i></button>
                                 <ul role="menu" class="dropdown-menu">
                                 <li class="change_status"> <a href="javascript:;" data-status="' . $user->hashtag_status . '" data-id="' . $user->hashtag_id . '"> ' . $activeStatus . ' </a> </li>
                                  <li class="delete_hashtag"> <a href="javascript:;"  data-id="' . $user->hashtag_id . '"> Delete </a> </li>
                                  </ul> </div> ';
        }
        return $htmlData;
    }

    public function updateHashtagStatus(Request $request)
    {
        try {

            $postData = $request->all();
            $user_id = $postData['user_id'];
            $status = $postData['user_status'];
            $objUserModel = new User();

            if ($status == 'A') {
                $updated_data = ['hashtag_status' => 'I'];
            } else if ($status == 'I') {
                $updated_data = ['hashtag_status' => 'A'];
            } else {
                return 0;
            }
            $result = $objUserModel->changeHashtagStatus($user_id, $updated_data);
            if ($result === 1) {
                return 1;
            }
        } catch (\Exception $e) {
            return 0;
        }
        return 0;
    }


    public function removeDefaultHashtag(Request $request)
    {
        try {
            $removeId = $request->all()['removeId'];
            $objUserModel = new User();
            $result = $objUserModel->removeHashtag($removeId);
            if ($result === 1) {
                return 1;
            }
            return 0;
        } catch (\Exception $e) {
//            dd($e->getMessage());
            return 0;

        }
    }


    public function hashagFinder(Request $request)
    {
        if (!empty($request->all()['tag'])) {
            $tag = $request->all()['tag'];
            $api_url = 'https://www.instagram.com/web/search/topsearch/?context=blended&query=%23' . $tag;
            $curlResponse = json_decode(CurlRequestHandler::getInstance()->curlUsingGet($api_url), true);
            if (!empty($curlResponse)) {
                if (!empty($curlResponse['hashtags'])) {
                    $hashData = [];
                    foreach ($curlResponse['hashtags'] as $kay => $value) {
                        if (!empty($value['hashtag']['name']) && !empty($value['hashtag']['media_count'])) {
                            $hashData[$value['hashtag']['name']] = $value['hashtag']['media_count'];
                        }
                    }
                    return $hashData;
                } else {
                    return 400;
                }
            } else {
                return 402;
            }

        }
    }

    public function saveNewHashtag(Request $request)
    {

        try {
            if (!empty($request->all()['tag'])) {
                $hashData = $request->all()['tag'];
                $appendQueryData = '';
                $bind_data = [];
                foreach ($hashData as $key => $value) {
                    $appendQueryData .= '(?,?,?),';
                    $bind_data[] = $value;
                    $bind_data[] = time();
                    $bind_data[] = time();

                }
                $appendQueryData = substr($appendQueryData, 0, strlen($appendQueryData) - 1);
                $columns = 'hashtag_contents,created_at,updated_at';
                $queryWhere = 'INSERT INTO  default_hashtags_list (' . $columns . ') VALUES ' . $appendQueryData . ' ON DUPLICATE KEY UPDATE
                           updated_at=VALUES(updated_at)';

                $Obj = new User();
                $result = $Obj->saveHashtag($queryWhere, $bind_data);
                if ($result === true) {
                    return 200;
                } else {
                    return 400;
                }
            }

        } catch (\Exception $e) {
            return 400;
        }
    }
}