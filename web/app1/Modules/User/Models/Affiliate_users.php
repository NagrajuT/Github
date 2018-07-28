<?php namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class Affiliate_users extends Model
{


    public function getSubscribedUsers($raw_query)
    {
        try {
            $result=DB::select($raw_query['rawQuery'],isset($raw_query['bindParams']) ? $raw_query['bindParams'] : array());
            return $result;
        } catch (QueryException $ex) {
            return $ex->getMessage();
        }
    }
    public function getRefferedUsers($raw_query)
    {
        try {
            $result=DB::select($raw_query['rawQuery'],isset($raw_query['bindParams']) ? $raw_query['bindParams'] : array());
            return $result;
        } catch (QueryException $ex) {
            return $ex->getMessage();

        }
    }

    public function affClaimPaymentHistory($select,$user_id){


        try {
            $result = DB::table('affiliate_claim_history')
                ->select($select)
                ->where('reffered_user_id','=',$user_id)
                ->get();
            return $result;
        } catch (QueryException $ex) {
            return $ex->getMessage();

        }
    }

}
