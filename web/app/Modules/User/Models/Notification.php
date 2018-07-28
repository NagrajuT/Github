<?php namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class Notification extends Model
{

    public static $instance = null;
    protected $table = "notifications";

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

    public function getAllNotifications($where, $selectedCols = ['*'])
    {
        if (func_num_args() > 0) {
            $result = DB::table($this->table)
                ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                ->select($selectedCols)
                ->orderBy('notification_id','desc')
                ->get();

            return $result;

        } else {
            throw new Exception("Argument not passed");
        }
    }

    public function updateNotifications($where, $data){
        if (func_num_args() > 0) {
            $result = DB::table($this->table)
                ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                ->update($data);
            return $result;

        } else {
            throw new Exception("Argument not passed");
        }
    }
}
