<?php namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Mockery\CountValidator\Exception;


class PromotionDefaults extends Model
{

    public static $instance = null;
    protected $table = "app_default_values";

    public function getInstance()
    {

        if (!is_object(self::$instance)) {
            self::$instance = new PromotionDefaults();
        }
        return self::$instance;
    }


    public function getDefaults($select)
    {
            try {
                $result = DB::table($this->table)->select($select)->get();
                return $result;

            } catch (QueryException $ex) {
                return $ex->getMessage();

            }
    }

    public function setDefaults($raw_query)
    {
        try {
//            $result=DB::select($raw_query['rawQuery']);
            $result=DB::statement($raw_query['rawQuery'],isset($raw_query['bindParams']) ? $raw_query['bindParams'] : array());
//            dd($result);
            return $result;

        } catch (QueryException $ex) {
            return $ex->getMessage();

        }
    }

}
