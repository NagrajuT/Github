<?php namespace App\Modules\Admin\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Admin\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modules\Admin\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use SendGrid\Content;
use SendGrid\Email;
use SendGrid\Mail;
use SendGrid;

require public_path() . '/../vendor/autoload.php';

class AdminController extends Controller
{

    public function adminLogin(Request $request)
    {
        if (Session::has('instaffic_admin'))
            return redirect('/admin/dashboard');

        if ($request->isMethod('post')) {
            $postData = $request->all();

            $email = $request->input('email');
            $password = $request->input('password');

            $rules = [
                'email' => 'required|email',
                'password' => 'required'
            ];
            $message = [
                'email.required' => 'Please enter your email.',
                'email.email' => 'Please enter a valid email address',
                'password.required' => 'Please Enter your password'
            ];
            $validator = Validator::make($postData, $rules, $message);
            if ($validator->fails()) {
                return Redirect::back()->withErrors(['message' => $validator->errors()->all()])->withInput();
            }

            if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => 'A'])) {
                Session::put('instaffic_admin', Auth::user()['original']);
                return redirect('/admin/dashboard');
            } else {
                return Redirect::back()->withErrors(['message' => 'Invalid Email or Password'])->withInput();
            }
        }

        return view("Admin::admin.adminLogin");
    }

    public function dashboard()
    {
        $query = "SELECT
                (SELECT count(id) FROM users WHERE role='U') AS usersCount,
                (SELECT count(id) FROM users WHERE status = 'A' and role='U') AS aCount,
                (SELECT count(id) FROM users WHERE status = 'I') AS iCount,
                (SELECT count(id) FROM users WHERE status = 'P') AS pCount,
                (SELECT count(id) FROM users WHERE status = 'D') AS dCount,
                (SELECT count(id) FROM users WHERE register_type = 'RR') AS affiliateCount,
                (SELECT  count(UM.id) from usersmeta as UM JOIN users as U on UM.user_id=U.id where UM.user_type='PU' and U.register_type='RR') AS paidAffiliateCount,
                (SELECT count(id) FROM usersmeta WHERE user_type = 'DU') AS demoCount,
                (SELECT count(id) FROM usersmeta WHERE user_type = 'PU') AS paidCount,
                (SELECT count(ins_user_id) FROM instagram_users ) AS instagramUsersCount,
                (SELECT count(ins_user_id) FROM instagram_users WHERE subscribe_type = 'PU') AS puCount,
                (SELECT count(ins_user_id) FROM instagram_users WHERE subscribe_type = 'BU') AS buCount,
                (SELECT count(ins_user_id) FROM instagram_users WHERE subscribe_type = 'DU') AS duCount
                 FROM dual";
        $obj = new User();
        $result = $obj->getBasicdetails($query);
        return view('Admin::admin.dashboard')->with(['data' => $result[0]]);
    }

    public function logout()
    {
        if (Session::has('instaffic_admin')) {
            Session::forget('instaffic_admin');
        }
        Auth::logout();
        return redirect('/admin/login');
    }

    public function sendMail($email,$pwd_reset_link)
    {
        $apiKey = env('SENDGRID_API_KEY');
        $subject = "Reset Your Password";
        $from = new Email("Instaffic", "no-reply@mail.instaffic.com");
        $to = new Email('Instaffic', "nitishkumar@globussoft.in");

        ".env('WEB_URL')."/#support"
        $content = new Content("text/html", "<div style='border: 1px solid #F44336; border-radius: 10px; padding:30px; width:60%; margin-left: 20%; margin-right: 20%;' >
                                    <div>
                                        <a href='".env('WEB_URL')."/#support'><img style='width:200px;' src='http://panel.messazon.com/assets/images/hsbcLogo.png' alt='support@instaffic.com'/></a>
                                    </div><hr color='#F44336'>
                                    <div style='padding-left:30px;'>
                                        Hello, Nitish Kumar<br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Many more congratulations for getting job in HSBC. <br>
                                        <p>This is such a wonderful opportunity for you. And we know you'll do such a fantastic job over here.  We feel certain that you're making the right choice accepting this position.
                                           <br> <a href='".$pwd_reset_link."'><b>click here to Reset Your Password</b></a><br><br>

                                    </div><br>
                                    <hr color='#F44336'>
                                        <font color='#F44336'> Regards <br> Instaffic Team<br> Contact : support@hsbc.com</font>
                                </div>");
        $mail = new Mail($from, $subject, $to, $content);
        $sendGrid = new SendGrid($apiKey);

        $response = $sendGrid->client->mail()->send()->post($mail);
        return $response;
        dd($response);
        echo $response->statusCode();
        echo $response->headers();
        echo $response->body();
    }

    public function resetPassword1(Request $request)
    {
        $postData = $request->all();
        $rules = [
            'resetEmail' => 'required|email|exists:users,email'
        ];
        $message = [
            'resetEmail.required' => 'Please enter your email.',
            'resetEmail.email' => 'Please enter a valid email address',
            'resetEmail.exists' => 'The Email you entered does not exists',

        ];
        $validator = Validator::make($postData, $rules, $message);
        if (!$validator->fails()) {
            $email = $postData['resetEmail'];

            $objModal = new User();
//            $result=$objModal->getUserByEmail($email);
            $pwd_reset_token = str_random(40);
            $result = $objModal->updateResetCode($email, $pwd_reset_token);
            $pwd_reset_link = env('WEB_URL') . '/reset/password/confirm/' . $pwd_reset_token;
            $send=$this->sendMail($email,$pwd_reset_link);


            dd($send);
            dd($pwd_reset_link);

//                $encrypted=Crypt::encrypt('hello World');
//dd($encrypted);
//
//            try {
//                $decrypted = Crypt::decrypt($encrypted);
//            } catch (DecryptException $e) {
//               $e->getMessage();
//            }
//
//            dd($decrypted);

            dd('success');
        } else {
            return Redirect::back()->withErrors(['resetMessage' => $validator->errors()->all()])->withInput()->with('fromController', '');
        }


    }

    public function resetPasswordConfirm(Request $request, $token)
    {
        try {

            if (strlen(trim($token)) != 40) {

                return view('Admin::admin.confirmResetPassword')->with('message', ['status' => 'fail']);
            }
            $objModal = new User();
            $result = $objModal->validatePasswordResetToken($token);
            if (!(isset($result[0]) && !empty($result[0]))) {
                return view('Admin::admin.confirmResetPassword')->with('message', ['status' => 'fail']);
            }
            return view('Admin::admin.confirmResetPassword')->with('message', ['status' => 'success', 'data' => $token]);
        } catch (\Exception $e) {
            return view('Admin::admin.confirmResetPassword')->with('message', ['status' => 'fail']);
        }

    }

    public function setNewPassword(Request $request)
    {
        $postData = $request->all();
        $rules = [
            'new_password' => 'required|min:6|max:20',
            'confirm_password' => 'required|same:new_password',
            'pwd_reset_token' => 'required|size:40|exists:users,pwd_reset_token',
        ];
        $message = [
            'new_password.required' => 'Please enter new password.',
            'new_password.min' => 'New Pasword Must be minimum of 6 characters long',
            'new_password.max' => 'New Pasword can not more than 20 characters long',
            'confirm_password.required' => 'Please Enter Confirm Password',
            'confirm_password.same' => 'Your Password did not Match',
            'pwd_reset_token.required' => 'Invalid Request',
            'pwd_reset_token.size' => 'Invalid Request',
            'pwd_reset_token.exists' => 'Invalid Request',

        ];
        $validator = Validator::make($postData, $rules, $message);
        if (!$validator->fails()) {

            $objModal = new User();
            $hashPassword=Hash::make($postData['new_password']);

            $result = $objModal->updatePassword($hashPassword, $postData['pwd_reset_token']);
            if($result){
                    dd('password changed');
            }else{
                dd('something wrong');
            }
//            dd('$result----->',$result);
            return Redirect::back()->with('fromController', '');

        }else{
            return Redirect::back()->withErrors(['setNewPwd' => $validator->errors()->all()])->withInput()->with('fromController', '');

        }
    }

    public function resetPassword(Request $request){
        if($request->isMethod('POST')){
            $postData = $request->all();
//            $postData = array_map('trim', $postData);
            $rules = [
                'current_password' => 'required',
                'new_password' => 'required|different:current_password',
                'confirm_password' => 'required|same:new_password'
            ];
            $message = [
                'current_password.required' => 'current password is required.',
                'new_password.required' => 'new password is required.',
                'new_password.different' => 'Create a new password that isn\'t your current password',
                'confirm_password.required' => 'confirm password is required.',
                'confirm_password.same' => 'password did not match.'
            ];
            $validator = Validator::make($postData, $rules, $message);
            if (!$validator->fails()) {

                $adminObj=new Admin();
                $current_password_db=$adminObj->getCurrentPassword(Auth::id());
                if(Hash::check($postData['current_password'],$current_password_db->password)){
                    $new_pass=Hash::make($postData['new_password']);
                    $result=$adminObj->updatePassword(Auth::id(),$new_pass);
                    if($result===1){
                        return back()->with(['msg'=>'Password changed Successfuly']);
                    }else{
                        return back()->with(['errMsg'=>'Password not changed']);
                    }
                }else{
                    return back()->withInput()->with(['errMsg'=>'Your current password was entered incorrectly. Please enter it again.']);
                }

            } else {
                return back()->withInput()->withErrors($validator);
            }

        }else{
            return view("Admin::admin.resetPassword");
        }

    }

    public function checkNewNotification(Request $request)
    {

//        print_r('checking new Notifications..');
        $obj = new Admin();
        $newNotificationCount = $obj->getNotificatios(-1);
        $result = $obj->getNotificatios(1);
        $response = [];
        if (!empty($result)) {
            $response['count'] = $newNotificationCount;
            $response['data'] = $result;
            return ['code' => 200, 'status' => 'success', 'message' => 'notification found successfully', 'data' => $response];
        } else {
            return ['code' => 400, 'status' => 'fail', 'message' => 'no notification found'];
        }
    }

    public function updateAdminViewStatus()
    {
        $obj = new Admin();
        $response = $obj->updateStatus();
        if ($response > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function viewAllNotifications(Request $request)
    {
        $pagModal = new Admin();
        $offset = 0;
        $limit = 10;
        $cursor='';
        if ($request->isMethod('post')) {

            if (isset($request->all()['cursor']) && ($request->all()['cursor']) != 0) {
                $nextCursor = $request->all()['cursor'] + $limit;

                $totalCount = $pagModal->getNotificationData(0, -1);
                if ($totalCount < $nextCursor) {
                    $nextCursor = '';
                }
                $response = $pagModal->getNotificationData($request->all()['cursor'], $limit);
                if (!empty($response)) {
                    return ['code' => 200, 'status' => 'success', 'message' => 'notification found successfully', 'cursor' => $nextCursor, 'data' => $response];
                } else {
                    return ['code' => 400, 'status' => 'fail', 'message' => 'no notification found'];
                }
            } else if (isset($request->all()['cursor']) && $request->all()['cursor'] == 0) {
                $totalCount = $pagModal->getNotificationData(0, -1);
                if ($totalCount > $limit) {
                    $cursor = $limit;
                }
                $response = $pagModal->getNotificationData($offset, $limit);
                if (!empty($response)) {
                    return ['code' => 200, 'status' => 'success', 'message' => 'notification found successfully', 'cursor' => $cursor, 'data' => $response];
                } else {
                    return ['code' => 400, 'status' => 'fail', 'message' => 'no notification found'];
                }
            } else {
                return ['code' => 400, 'status' => 'fail', 'message' => 'no notification found'];
            }
        } else {
            return view('Admin::admin.adminNotifications');
        }


    }

}
