<?php namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class User extends Model
{

    public static $instance = null;
    protected $table = "users";
    protected $fillable = ['name', 'email', 'password'];

    /**
     * function for creating instance of User Models
     * @since 28-06-2016
     * @author Saurabh Kumar <saurabh.kumar@globussoft.in>
     */
    public static function getInstance()
    {
        if (!is_object(self::$instance)) {
            self::$instance = new User();
        }
        return self::$instance;
    }


    public function getBasicdetails($data)
    {
        $result = DB::select($data);
        return $result;
    }

    /**
     * @return string
     * @throws Exception
     * @since 15-1-2016
     * @author Saurabh Kumar <saurabh.kumar@globussoft.com>
     */
    public function getUserById($userId)
    {
        $result = User::whereId($userId)->first();
        return $result;
    }

    public function addNewUser()
    {
        if (func_num_args() > 0) {
            $data = func_get_arg(0);
            try {
                $result = DB::table($this->table)->insertGetId($data);
                return $result;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }
    }

    /**
     * Get all user details
     * @param $where
     * @param array $selectedColumns Column names to be fetched
     * @return mixed
     * @throws Exception
     * @since 15-1-2016
     * @author Saurabh Kumar <saurabh.kumar@globussoft.com>
     */
    public function getAllUsersWhere($where, $selectedColumns = ['*'])
    {
        if (func_num_args() > 0) {
            $where = func_get_arg(0);
            $result = DB::table($this->table)
                ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                ->select($selectedColumns)
                ->get();
            return $result;
        } else {
            throw new Exception('Argument Not Passed');
        }
    }

    /**
     * @param $where
     * @param array $selectedColumns
     * @return mixed
     * @since 15-1-2016
     * @author Saurabh Kumar <saurabh.kumar@globussoft.com>
     */
    public function getUserWhere($where, $selectedColumns = ['*'])
    {
        $result = DB::table($this->table)
            ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
            ->select($selectedColumns)
            ->first();
        return $result;
    }

    /**
     * Update plan details
     * @return string
     * @throws Exception
     * @since 15-1-2016
     * @author Saurabh Kumar <saurabh.kumar@globussoft.com>
     */
    public function updateUserWhere()
    {
        if (func_num_args() > 0) {
            $data = func_get_arg(0);
            $where = func_get_arg(1);
            try {
                $result = DB::table($this->table)
                    ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                    ->update($data);
                return $result;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }
    }

    /**
     * Delete plan details
     * @return string
     * @throws Exception
     * @since 15-1-2016
     * @author Saurabh Kumar <saurabh.kumar@globussoft.com>
     */
    public function deleteUserWhere()
    {
        if (func_num_args() > 0) {
            $where = func_get_arg(0);
            try {
                $result = DB::table($this->table)
                    ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                    ->delete();
                return $result;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }

    }

    public function getFavoriteListCount($where)
    {
        if (func_num_args() > 0) {

            $result = DB::table('favorite_profiles')
                ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                ->select(["*"])
                ->get();
            return $result;
        } else {
            throw new Exception('Argument Not Passed');
        }


    }

    public function getFavoriteList($where, $sortingOrder, $iDisplayStart, $iDisplayLength)
    {


        try {
            $result = array();
            if ($iDisplayLength < 0) {
                $result = DB::table('favorite_profiles')
                    ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                    ->orderBy($sortingOrder[0], $sortingOrder[1])
                    ->select('instagram_id', 'last_post_uploaded_time', 'created_at', 'updated_at')
                    ->get();
            } else {
                $result = DB::table('favorite_profiles')
//                    ->where($where)
                    ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                    ->skip($iDisplayStart)->take($iDisplayLength)
                    ->orderBy($sortingOrder[0], $sortingOrder[1])
                    ->select("*")
                    ->get();

            }

            if ($result)
                return $result;
            else
                return 0;
        } catch (QueryException $exc) {
            return $exc->getMessage();
        }
    }

//    =====================================(start)================================================

    public function getUserByEmail111($email)
    {

        try {
            $result = DB::table('users')
                ->where('email', $email)
                ->select('id')
                ->get();
            return $result;
        } catch (QueryException $e) {
            return 'query Error';

        }
    }
    public function updateResetCode($email,$pwd_reset_token)
    {

        try {
            $result = DB::table('users')
                ->where('email', $email)
                ->update(['pwd_reset_token'=>$pwd_reset_token]);
            return $result;
        } catch (QueryException $e) {
            return 'query Error';

        }
    }
    public function validatePasswordResetToken($token){
        try{

            $result=DB::table('users')
                ->where('pwd_reset_token',$token)
                ->select('id')
                ->get();
            return $result;
        }catch(QueryException $e){
            $e->getMessage();
        }
    }
    public function updatePassword($hashPassword,$token){

        try{
            $result=DB::table('users')
                ->where('pwd_reset_token',$token)
                ->update(['password'=>$hashPassword,'pwd_reset_token'=>null]);
            return $result;
        }catch(QueryException $e){
            $e->getMessage();
        }
    }

    public function getFilteredUsers($where, $sortingOrder, $iDisplayStart, $iDisplayLength)
    {
        try {
            if ($iDisplayLength == -2) {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('users')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->where('role', 'U')
                        ->whereIn('status', ['A', 'I', 'D'])
                        ->count();
                } else {
                    $result = DB::table('users')
                        ->where('role', 'U')
                        ->whereIn('status', ['A', 'I', 'D'])
                        ->count();
                }
            } else if ($iDisplayLength < 0) {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('users')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->where('role', 'U')
                        ->whereIn('status', ['A', 'I', 'D'])
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select('id', 'email', 'status', 'register_type','created_at')
                        ->get();
                } else {
                    $result = DB::table('users')
                        ->where('role', 'U')
                        ->whereIn('status', ['A', 'I', 'D'])
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select('id', 'email', 'status', 'register_type','created_at')
                        ->get();
                }
            } else {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('users')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->where('role', 'U')
                        ->whereIn('status', ['A', 'I', 'D'])
                        ->skip($iDisplayStart)->take($iDisplayLength)
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select('id', 'email', 'status', 'register_type','created_at')
                        ->get();
                } else {
                    $result = DB::table('users')
                        ->where('role', 'U')
                        ->whereIn('status', ['A', 'I', 'D'])
                        ->skip($iDisplayStart)->take($iDisplayLength)
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select('id', 'email', 'status', 'register_type','created_at')
                        ->get();
                }

            }
            if ($result)
                return $result;
            else
                return [];
        } catch (QueryException $exc) {
            return $exc->getMessage();
        }
    }

    public function getUsersDetails($query, $bindParams)
    {

        try {
            $result = DB::select($query, $bindParams);
//            dd($result);
            return $result;

        } catch (QueryException $exc) {
            return $exc->getMessage();
        }
    }

    public function updateUserStatus($user_id, $updated_data)
    {

        try {
            $result = DB::table('users')
                ->whereRaw('id=?', [$user_id])
                ->update($updated_data);
            return $result;

        } catch (QueryException $exc) {
            return $exc->getMessage();
        }
    }

    public function getFilteredUsersInstaAccount($where, $sortingOrder, $iDisplayStart, $iDisplayLength)
    {
        try {
            if ($iDisplayLength == -2) {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('users')
                        ->join('instagram_users', 'users.id', '=', 'instagram_users.added_by_user_id')
                        ->join('login_details', 'instagram_users.ins_user_id', '=', 'login_details.for_instagram_user_id')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->count();
                } else {
                    $result = DB::table('users')
                        ->join('instagram_users', 'users.id', '=', 'instagram_users.added_by_user_id')
                        ->join('login_details', 'instagram_users.ins_user_id', '=', 'login_details.for_instagram_user_id')
                        ->count();
                }

            } else if ($iDisplayLength < 0) {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('users')
                        ->join('instagram_users', 'users.id', '=', 'instagram_users.added_by_user_id')
                        ->join('login_details', 'instagram_users.ins_user_id', '=', 'login_details.for_instagram_user_id')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select('instagram_users.ins_user_id', 'users.email', 'instagram_users.username', 'instagram_users.status', 'instagram_users.subscribe_type', 'instagram_users.created_at', 'login_details.is_user_disconnected')
                        ->get();
                } else {
                    $result = DB::table('users')
                        ->join('instagram_users', 'users.id', '=', 'instagram_users.added_by_user_id')
                        ->join('login_details', 'instagram_users.ins_user_id', '=', 'login_details.for_instagram_user_id')
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select('instagram_users.ins_user_id', 'users.email', 'instagram_users.username', 'instagram_users.status', 'instagram_users.subscribe_type', 'instagram_users.created_at', 'login_details.is_user_disconnected')
                        ->get();
                }

            } else {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('users')
                        ->join('instagram_users', 'users.id', '=', 'instagram_users.added_by_user_id')
                        ->join('login_details', 'instagram_users.ins_user_id', '=', 'login_details.for_instagram_user_id')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->skip($iDisplayStart)->take($iDisplayLength)
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select('instagram_users.ins_user_id', 'users.email', 'instagram_users.username', 'instagram_users.status', 'instagram_users.subscribe_type', 'instagram_users.created_at', 'login_details.is_user_disconnected')
                        ->get();
                } else {
                    $result = DB::table('users')
                        ->join('instagram_users', 'users.id', '=', 'instagram_users.added_by_user_id')
                        ->join('login_details', 'instagram_users.ins_user_id', '=', 'login_details.for_instagram_user_id')
                        ->skip($iDisplayStart)->take($iDisplayLength)
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select('instagram_users.ins_user_id', 'users.email', 'instagram_users.username', 'instagram_users.status', 'instagram_users.subscribe_type', 'instagram_users.created_at', 'login_details.is_user_disconnected')
                        ->get();
                }

            }
            if ($result)
                return $result;
            else
                return [];
        } catch (QueryException $exc) {
            return $exc->getMessage();
        }
    }

    public function getActivityStatistics($id)
    {
        try {
            $columns = [
                'CF.default_gender_filter',
                'CF.default_promotion_status',
                'CF.default_promotion_start_time',
                'CF.default_promotion_stop_time',
                'CF.like',
                'CF.follow',
                'CF.unfollow',
                'CF.unfollow_option',
                'CF.media_type',
                'CF.gender',
                'IU.filter_promotion_status',
                'IU.filter_promotion_start_time',
                'IU.filter_promotion_stop_time',
                'IU.current_promotion_status',
                'IU.current_promotion_type',

                'ACS.total_time_used',
                'ACS.insta_follows_count',
                'ACS.default_likes_count',
                'ACS.default_follows_count',
                'ACS.default_followers_count',
                'ACS.default_unfollows_count',

                'ACS.filter_likes_count',
                'ACS.filter_follows_count',
                'ACS.filter_followers_count',
                'ACS.filter_unfollows_count',

                'IU.full_name',
                'IU.username',
                'IU.profile_pic_url',
                'IU.gender',
                'IU.status',
                'IU.total_subscription_time',
                'IU.time_period_left',
                'IU.start_date',
                'IU.stop_date',
                'IU.stop_reason'

            ];
            $result = DB::table('instagram_users AS IU')
                ->join('config_filters AS CF', 'IU.ins_user_id', '=', 'CF.for_instagram_user_id')
                ->join('activity_stats AS ACS', 'IU.ins_user_id', '=', 'ACS.for_instagram_user_id')
                ->whereRaw('IU.ins_user_id=?', [$id])
                ->select($columns)
                ->get();
            return $result;
        } catch (QueryException $exc) {
            return $exc->getMessage();
        }
    }

    public function getFilteredPendingUsers($where, $sortingOrder, $iDisplayStart, $iDisplayLength)
    {
        try {
            if ($iDisplayLength == -2) {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('users')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->where('status', 'P')
                        ->count();
                } else {
                    $result = DB::table('users')
                        ->where('status', 'P')
                        ->count();
                }
            } else if ($iDisplayLength < 0) {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('users')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->where('status', 'P')
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select('id', 'email', 'created_at', 'status', 'register_type')
                        ->get();
                } else {
                    $result = DB::table('users')
                        ->where('status', 'P')
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select('id', 'email', 'created_at', 'status', 'register_type')
                        ->get();
                }
            } else {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('users')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->where('status', 'P')
                        ->skip($iDisplayStart)->take($iDisplayLength)
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select('id', 'email', 'created_at', 'status', 'register_type')
                        ->get();
                } else {
                    $result = DB::table('users')
                        ->where('status', 'P')
                        ->skip($iDisplayStart)->take($iDisplayLength)
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select('id', 'email', 'created_at', 'status', 'register_type')
                        ->get();
                }

            }
            if ($result)
                return $result;
            else
                return [];
        } catch (QueryException $exc) {
            return $exc->getMessage();
        }
    }

    public function removePendingUserAccount($id)
    {
        if (func_num_args() > 0) {
            $result = DB::table('users')
                ->whereRaw('id=?', [$id])
                ->where('status', 'P')
                ->delete();
            return $result;

        } else {
            throw new Exception('Argument Not Passed');
        }
    }

    public function getFilteredAffiliateUsers($where, $sortingOrder, $iDisplayStart, $iDisplayLength)
    {
        try {
            if ($iDisplayLength == -2) {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('users')
                        ->join('usersmeta', 'users.id', '=', 'usersmeta.user_id')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->where('register_type', 'RR')
                        ->whereIn('users.status', ['A', 'I', 'D'])
                        ->count();
                } else {
                    $result = DB::table('users')
                        ->join('usersmeta', 'users.id', '=', 'usersmeta.user_id')
                        ->where('register_type', 'RR')
                        ->whereIn('users.status', ['A', 'I', 'D'])
                        ->count();
                }
            } else if ($iDisplayLength < 0) {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('users')
                        ->join('usersmeta', 'users.id', '=', 'usersmeta.user_id')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->where('register_type', 'RR')
                        ->whereIn('users.status', ['A', 'I', 'D'])
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select('users.id', 'users.email', 'users.created_at', 'users.status', 'usersmeta.user_type')
                        ->get();
                } else {

                    $result = DB::table('users')
                        ->join('usersmeta', 'users.id', '=', 'usersmeta.user_id')
                        ->whereIn('users.status', ['A', 'I', 'D'])
                        ->where('register_type', 'RR')
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select('users.id', 'users.email', 'users.created_at', 'users.status', 'usersmeta.user_type')
                        ->get();
                }
            } else {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('users')
                        ->join('usersmeta', 'users.id', '=', 'usersmeta.user_id')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->where('register_type', 'RR')
                        ->whereIn('users.status', ['A', 'I', 'D'])
                        ->skip($iDisplayStart)->take($iDisplayLength)
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select('users.id', 'users.email', 'users.created_at', 'users.status', 'usersmeta.user_type')
                        ->get();
                } else {
                    $result = DB::table('users')
                        ->join('usersmeta', 'users.id', '=', 'usersmeta.user_id')
                        ->where('register_type', 'RR')
                        ->whereIn('users.status', ['A', 'I', 'D'])
                        ->skip($iDisplayStart)->take($iDisplayLength)
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select('users.id', 'users.email', 'users.created_at', 'users.status', 'usersmeta.user_type')
                        ->get();
                }

            }
            if ($result)
                return $result;
            else
                return [];
        } catch (QueryException $exc) {
            return $exc->getMessage();
        }
    }

    public function getAffliateDetails($query, $bindParams)
    {
        try {
            $result = DB::select($query, $bindParams);
            return $result;

        } catch (QueryException $exc) {
            return $exc->getMessage();
        }
    }

    public function getFilteredUsersPaymentHistory($where, $sortingOrder, $iDisplayStart, $iDisplayLength)
    {
        try {
            $columns = array(
                'users.email',
                'transactions.transaction_id',
                'transactions.txn_id',
                'users.register_type',
//                'transactions.payer_email',
                'transactions.quantity',
//                'transactions.currency_code',
                'transactions.amount',
                'transactions.txn_status',
                'transactions.payment_time',
                'transactions.payment_mode',
                'transactions.created_at',
            );
            if ($iDisplayLength == -2) {

                if (isset($where['rawQuery'])) {
                    $result = DB::table('transactions')
                        ->join('users', 'transactions.for_user_id', '=', 'users.id')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->count();
                } else {

                    $result = DB::table('transactions')
                        ->join('users', 'transactions.for_user_id', '=', 'users.id')
                        ->count();

                }

            } else if ($iDisplayLength < 0) {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('transactions')
                        ->join('users', 'transactions.for_user_id', '=', 'users.id')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select($columns)
                        ->get();
                } else {
                    $result = DB::table('transactions')
                        ->join('users', 'transactions.for_user_id', '=', 'users.id')
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select($columns)
                        ->get();
                }

            } else {
                if (isset($where['rawQuery'])) {

                    $result = DB::table('transactions')
                        ->join('users', 'transactions.for_user_id', '=', 'users.id')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->skip($iDisplayStart)->take($iDisplayLength)
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select($columns)
                        ->get();
                } else {

                    $result = DB::table('transactions')
                        ->join('users', 'transactions.for_user_id', '=', 'users.id')
                        ->skip($iDisplayStart)->take($iDisplayLength)
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select($columns)
                        ->get();
                }
            }
            if ($result){
                return $result;
            }
            else{
                return [];
            }
        } catch (QueryException $exc) {
            return $exc->getMessage();
        }
    }

    public function getPaymentDetails($bindParams)
    {
        try {
            $result = DB::table('transactions')
                ->whereRaw('transaction_id=?', $bindParams)
                ->select('paymentInfoList')
                ->get();
            return $result;

        } catch (QueryException $exc) {
            return $exc->getMessage();
        }
    }

    public function getDefaultHashtag($where){
        try{
            if(empty($where)){
                $results = DB::table('default_hashtags_list')
//                    ->orderBy('updated_at', 'desc')
                    ->orderBy('hashtag_contents', 'asc')
                    ->select('hashtag_id','hashtag_contents','hashtag_status')
                    ->paginate(50);
            }else{
                $results = DB::table('default_hashtags_list')
                    ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
//                    ->orderBy('updated_at', 'desc')
                    ->orderBy('hashtag_contents', 'asc')
                    ->select('hashtag_id','hashtag_contents','hashtag_status')
                    ->paginate(50);
            }

//            dd($results->links());
            return $results;
        }catch(\Exception $e){
            return $e->getMessage();

        }

    }

    public function changeHashtagStatus($user_id, $updated_data)
    {

        try {

            $result = DB::table('default_hashtags_list')
                ->whereRaw('hashtag_id=?', [$user_id])
                ->update($updated_data);
            return $result;

        } catch (\Exception $exc) {
            return $exc->getMessage();
        }
    }

    public function removeHashtag($id)
    {
        try {
            $result = DB::table('default_hashtags_list')
                ->whereRaw('hashtag_id=?', [$id])
                ->delete();
            return $result;
        }catch (\Exception $exc) {
            return $exc->getMessage();
        }
    }


    public static function saveHashtag($query, $params)
    {
        try {
            $result = DB::statement($query, $params);
            return $result;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getFilteredAffiliatePaymentHistory($where, $sortingOrder, $iDisplayStart, $iDisplayLength)
    {
        try {

            $columns = array(
                'AUP.affiliate_user_payments_id',
                'U.email as userEmail',
                'U1.email as referredEmail',
                'AUP.total_amount',
                'AUP.affiliate_amount',
                'AUP.created_at',
                'AUP.claim_status',
                'AUP.claim_date',
            );
            if ($iDisplayLength == -2) {

                if (isset($where['rawQuery'])) {
                    $result = DB::table('affiliate_user_payments AS AUP')
                        ->join('users AS U', 'AUP.payer_user_id', '=', 'U.id')
                        ->join('users AS U1', 'AUP.reffered_user_id', '=', 'U1.id')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->count();
                } else {
                    $result = DB::table('affiliate_user_payments AS AUP')
                        ->join('users AS U', 'AUP.payer_user_id', '=', 'U.id')
                        ->join('users AS U1', 'AUP.reffered_user_id', '=', 'U1.id')
                        ->count();
                }

            } else if ($iDisplayLength < 0) {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('affiliate_user_payments AS AUP')
                        ->join('users AS U', 'AUP.payer_user_id', '=', 'U.id')
                        ->join('users AS U1', 'AUP.reffered_user_id', '=', 'U1.id')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select($columns)
                        ->get();
                } else {
                    $result = DB::table('affiliate_user_payments AS AUP')
                        ->join('users AS U', 'AUP.payer_user_id', '=', 'U.id')
                        ->join('users AS U1', 'AUP.reffered_user_id', '=', 'U1.id')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select($columns)
                        ->get();
                }

            } else {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('affiliate_user_payments AS AUP')
                        ->join('users AS U', 'AUP.payer_user_id', '=', 'U.id')
                        ->join('users AS U1', 'AUP.reffered_user_id', '=', 'U1.id')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->skip($iDisplayStart)->take($iDisplayLength)
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select($columns)
                        ->get();
                } else {
                    $result = DB::table('affiliate_user_payments AS AUP')
                        ->join('users AS U', 'AUP.payer_user_id', '=', 'U.id')
                        ->join('users AS U1', 'AUP.reffered_user_id', '=', 'U1.id')
                        ->skip($iDisplayStart)->take($iDisplayLength)
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select($columns)
                        ->get();
                }
            }
            if ($result){
                return $result;
            }
            else{
                return [];
            }
        } catch (QueryException $exc) {
            return $exc->getMessage();
        }
    }

    public function getFilteredAffiliateClaimtHistory($where, $sortingOrder, $iDisplayStart, $iDisplayLength)
    {
        try {
            $columns = array(
                'APH.affiliate_claim_history_id',
                'APH.claim_amount',
                'APH.admin_view_status',
                'APH.claim_status_message',
                'APH.claim_status',
                'U.email',
                'APH.created_at',
            );
            if ($iDisplayLength == -2) {

                if (isset($where['rawQuery'])) {
                    $result = DB::table('affiliate_claim_history AS APH')
                        ->join('users AS U', 'APH.reffered_user_id', '=', 'U.id')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->count();
                } else {
                    $result = DB::table('affiliate_claim_history AS APH')
                        ->join('users AS U', 'APH.reffered_user_id', '=', 'U.id')
                        ->count();

                }

            } else if ($iDisplayLength < 0) {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('affiliate_claim_history AS APH')
                        ->join('users AS U', 'APH.reffered_user_id', '=', 'U.id')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select($columns)
                        ->get();
                } else {
                    $result = DB::table('affiliate_claim_history AS APH')
                        ->join('users AS U', 'APH.reffered_user_id', '=', 'U.id')
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select($columns)
                        ->get();
                }

            } else {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('affiliate_claim_history AS APH')
                        ->join('users AS U', 'APH.reffered_user_id', '=', 'U.id')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->skip($iDisplayStart)->take($iDisplayLength)
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select($columns)
                        ->get();
                } else {
                    $result = DB::table('affiliate_claim_history AS APH')
                        ->join('users AS U', 'APH.reffered_user_id', '=', 'U.id')
                        ->skip($iDisplayStart)->take($iDisplayLength)
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select($columns)
                        ->get();
                }
            }
            if ($result){
                return $result;
            }
            else{
                return [];
            }
        } catch (QueryException $exc) {
            return $exc->getMessage();
        }
    }

    public function UpdateMassPaymentResponse($query){
        try{
            $result=DB::statement($query);
            return $result;

        }catch(\Exception $e){
            return $e->getMessage();

        }

    }


    public function UpdatePaymentStatus($data)
    {
        try {
            $result = DB::table('affiliate_claim_history')
                ->whereIn('affiliate_claim_history_id', $data)
                ->update(['claim_status'=>'PR']);
            return $result;
        } catch (\Exception $e) {
            return $e->getMessage();

        }

    }


//    =====================================(start)================================================


}