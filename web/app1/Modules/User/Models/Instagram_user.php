<?php namespace App\Modules\User\Models;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Instagram_user extends Model
{

    public function getInstagramUsersDetails($where, $selectedCols = ['*'])
    {
        try {
            $result = DB::table('instagram_users')
                ->whereRaw($where['rawQuery'], (isset($where['bindParams'])) ? $where['bindParams'] : array())
                ->select($selectedCols)
                ->get();
            return $result;

        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

    public function getDetails($where, $selectedCols = ['*']){
        try {
            $result = DB::table('users')
                ->join('usersmeta','usersmeta.user_id','=','users.reffered_user_id')
                ->whereRaw($where['rawQuery'], (isset($where['bindParams'])) ? $where['bindParams'] : array())
                ->select($selectedCols)
                ->get();
//            dd($result);
            return $result;

        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

}
