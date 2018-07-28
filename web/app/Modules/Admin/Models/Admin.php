<?php namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{

    public function showProxies()
    {

        try {
            $columns = [
                "proxy_id",
                "proxy_username",
                "proxy_password",
                "proxy_type",
                "proxy_ip",
                "proxy_port",
                "proxy_location",
                "proxy_status",
                "updated_at",
                "created_at"
            ];
            $result = DB::table("proxy_details")
                ->select($columns)
                ->get();
            return $result;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function saveProxy($query, $params)
    {
        try {
            $result = DB::statement($query, $params);

            return $result;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteProxy($id)
    {
        try {
            $result = DB::table('proxy_details')
                ->where('proxy_id', $id)
                ->delete();
            return $result;
        } catch (\Exception $e) {
            return $e->getMessage();

        }

    }

    public function updateProxyStatus($proxy_id, $updated_data)
    {
        try {
            $result = DB::table('proxy_details')
                ->whereRaw('proxy_id=?', [$proxy_id])
                ->update($updated_data);

            return $result;
        } catch (QueryException $exc) {
            return $exc->getMessage();
        }
    }

    public function getCurrentPassword($id){
        try{
            $result=DB::table('users')
                ->where('id',$id)
                ->select('password')
                ->get();
            return $result[0];

        }catch(\Exception $e){
            return $e->getMessage();
        }

    }

    public function updatePassword($id,$pass){
        try{
            $result=DB::table('users')
                ->where('id',$id)
                ->update(['password'=>$pass]);
            return $result;

        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function getNotificatios($check){
        try{
            if($check==-1){
                $result=DB::table('admin_notifications')
                    ->where('view_status',0)
                    ->count();
                return $result;
            }else{
                $result=DB::table('admin_notifications')
                    ->take(15)->orderBy('admin_notifications_id','desc')
                    ->select('notification_message','notification_type','created_at')
                    ->get();
                return $result;
            }
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function updateStatus(){
        try{
            $result=DB::table('admin_notifications')
                ->where('view_status',0)
                ->update(['view_status'=>1]);
            return $result;
        }catch(\Exception $e){
            return -1;

        }
    }

    public static function saveProxyFile($query, $params)
    {
        try {
            $result = DB::statement($query, $params);
            return $result;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getNotificationData($offset,$limit){
        try{

            if($limit==-1){
                $result=DB::table('admin_notifications')
                    ->count();
            }else{
                $result=DB::table('admin_notifications')
                    ->skip($offset)->take($limit)
                    ->orderBy('admin_notifications_id','desc')
                    ->select('admin_notifications_id','notification_message','notification_type','created_at')
                    ->get();
            }

            return $result;
        }catch(\Exception $e){
            return $e->getMessage();

        }
    }

    public function getUserPaymentDetails($users){
        try{
            $select=[
                'ACH.claim_amount',
                'ACH.affiliate_claim_history_id',
                'UM.paypal_email'

            ];
            $result=DB::table('affiliate_claim_history AS ACH')
                ->join('usersmeta AS UM','UM.user_id','=','ACH.reffered_user_id')
                ->whereIn('ACH.affiliate_claim_history_id',$users)
                ->whereIn('claim_status',['P','F'])
                ->select($select)
                ->get();
            return $result;

        }catch(\Exception $e){
            return null;
        }

    }

    public function getFilteredProxy($where, $sortingOrder, $iDisplayStart, $iDisplayLength)
    {
        try {
            $columns = [
                "proxy_id",
                "proxy_username",
                "proxy_password",
                "proxy_type",
                "proxy_ip",
                "proxy_port",
                "proxy_location",
                "proxy_status",
                "updated_at",
                "created_at"
            ];
            if ($iDisplayLength == -2) {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('gender_proxies')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->count();
                } else {
                    $result = DB::table('gender_proxies')
                        ->count();
                }
            } else if ($iDisplayLength < 0) {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('gender_proxies')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select($columns)
                        ->get();
                } else {
                    $result = DB::table('gender_proxies')
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select($columns)
                        ->get();
                }
            } else {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('gender_proxies')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->skip($iDisplayStart)->take($iDisplayLength)
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select($columns)
                        ->get();
                } else {
                    $result = DB::table('gender_proxies')
                        ->skip($iDisplayStart)->take($iDisplayLength)
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select($columns)
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

    /**
     * @desc to get dedicated proxy from instagram account on filtration
     * @param $where
     * @param $sortingOrder
     * @param $iDisplayStart
     * @param $iDisplayLength
     * @return array|string
     * @since 10-nov-2017
     * @author Nitish Kumar <nitishkumar@globussoft.in>
     */
    public function getFilteredInstaProxy($where, $sortingOrder, $iDisplayStart, $iDisplayLength)
    {
        try {
            $columns = [
                "proxy_id",
                "proxy_username",
                "proxy_password",
                "proxy_type",
                "proxy_ip",
                "proxy_port",
                "isAllocated",
                "proxy_location",
                "proxy_status",
                "updated_at",
                "created_at"
            ];
            if ($iDisplayLength == -2) {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('insta_account_proxies')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->count();
                } else {
                    $result = DB::table('insta_account_proxies')
                        ->count();
                }
            } else if ($iDisplayLength < 0) {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('insta_account_proxies')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select($columns)
                        ->get();
                } else {
                    $result = DB::table('insta_account_proxies')
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select($columns)
                        ->get();
                }
            } else {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('insta_account_proxies')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->skip($iDisplayStart)->take($iDisplayLength)
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select($columns)
                        ->get();
                } else {
                    $result = DB::table('insta_account_proxies')
                        ->skip($iDisplayStart)->take($iDisplayLength)
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select($columns)
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


}
