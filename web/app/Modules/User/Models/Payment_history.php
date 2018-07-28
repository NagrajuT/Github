<?php namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class Payment_history extends Model
{

    public static $instance = null;
    protected $table = "transactions";

    public function getInstance()
    {

        if (!is_object(self::$instance)) {
            self::$instance = new Notification();
        }
        return self::$instance;
    }

    public function getNotifications($where, $selectedCols = ['*'])
    {
        if (func_num_args() > 0) {
            $result = DB::table($this->table)
                ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                ->select($selectedCols)
                ->orderBy('notification_id','desc')
                ->LIMIT(10)
                ->get();

            return $result;

        } else {
            throw new Exception("Argument not passed");
        }
    }

    public function getPaymentDetails($select,$user_id)
    {
        if (func_num_args() > 0) {
            $result = DB::table($this->table)
                ->select($select)
                ->where('for_user_id','=',$user_id)
                ->whereIn('txn_status', ['S', 'P', 'F'])
                ->get();
            return $result;
        } else {
            throw new Exception("Argument not passed");
        }
    }


}
