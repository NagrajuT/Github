<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Auth\UserAuth;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next, $module)
    {
//        if ($this->auth->guest()) {

//            dd($request->ajax());
//            if ($request->ajax()) {
//                return response('Unauthorized.', 401);
//            } else {
//                return redirect()->guest('/');
//            }
//        }



//        if ($module == 'user') {
//            if (!UserAuth::check()) {
//                return redirect('/');
//            }
//        }else if($module=='admin'){
//            if (!(Auth::check() && Session::has('instaffic_admin'))) {
//                return redirect('/admin/login');
//            }
//        }
//
//        return $next($request);


        if ($module == 'user') {
            if (!UserAuth::check()) {
                if(Request::ajax()){
                    return 'user session expired';
                }
                return redirect('/');
            }
        }else if($module=='admin'){
            if (!(Auth::check() && Session::has('instaffic_admin'))) {
                if(Request::ajax()){
                    return 'admin session expired';
                }
                return redirect('/admin/login');
            }
        }

        return $next($request);

    }

}
