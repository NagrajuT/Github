<?php

namespace App\Modules\Admin\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;
use Exception;

class InstaAccount extends Model implements AuthenticatableContract,
    AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    public function getFilteredAccounts($where, $sortingOrder, $iDisplayStart, $iDisplayLength)
    {
        try {
            if ($iDisplayLength == -2) {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('accounts')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->count();
                } else {
                    $result = DB::table('accounts')
                        ->count();
                }
            }
            else if ($iDisplayLength < 0) {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('accounts')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select('account_id', 'username', 'updated_at', 'status')
                        ->get();
                } else {
                    $result = DB::table('accounts')
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select('account_id', 'username', 'updated_at', 'status')
                        ->get();
                }

            } else {
                if (isset($where['rawQuery'])) {
                    $result = DB::table('accounts')
                        ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                        ->skip($iDisplayStart)->take($iDisplayLength)
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select('account_id', 'username', 'updated_at', 'status')
                        ->get();
                } else {
                    $result = DB::table('accounts')
                        ->skip($iDisplayStart)->take($iDisplayLength)
                        ->orderBy($sortingOrder[0], $sortingOrder[1])
                        ->select('account_id', 'username', 'updated_at', 'status')
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

    public function getAccountDetails($id)
    {
        if (func_num_args() > 0) {
            $select=[
//                'account_id',
                'username',
                'password',
                'gender',
                'insta_reg_email_id',
                'insta_reg_email_pwd',
                'alternate_reg_email_id',
                'alternate_reg_email_pwd',
                'insta_reg_contact',
                'email_verify_contact',
                'status',
                'is_user_disconnected',
                'set_proxy',
                'proxy_location',
                'proxy_ip',
                'proxy_port',
                'proxy_type',
                'proxy_username',
                'proxy_password',
                'created_at'
            ];
            $result=DB::table('accounts')
                ->where('account_id',$id)
                ->select($select)
                ->get();
            return $result;

        }else{
            throw new Exception('Argument Not Passed');
        }
    }

    public function removeAccount($id)
    {
        if (func_num_args() > 0) {

            $result=DB::table('accounts')
                ->where('account_id',$id)
                ->delete();
            return $result;

        }else{
            throw new Exception('Argument Not Passed');
        }
    }

    public function updateFreeSubscription($data)
    {
        try {
            $result = DB::table('instagram_users')
                ->where('username', $data['username'])
                ->update([
                    'subscribe_type' => $data['package_type'],
                    'total_subscription_time' => DB::raw('total_subscription_time+' . $data['add_time']),
                    'time_period_left' => DB::raw('time_period_left+' . $data['add_time']),
                ]);
            return ($result) ? true : false;
        } catch (\Exception $e) {
            return false;
        }

    }

}
