<?php namespace App\Modules\User\Controllers;

use App\Http\Controllers\Auth\UserAuth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modules\User\Models\Notification;

use Illuminate\curl\CurlRequestHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    protected $API_URL;

    public function __construct()
    {
        $this->API_URL = env('API_URL');
    }


    public function getNotifications(Request $request)
    {
        //Session::get('instaffic_user')['id']
        $objNotification = new Notification();
        $notifications = $objNotification->getNotifications(['rawQuery' => 'for_user_id = ?', 'bindParams' => [Session::get('instaffic_user')['id']]]);
        if ($notifications) {
            foreach ($notifications as $notification) {
                $notification->created_at = $this->convertUnixTimeStamp($notification->created_at);
            }
            echo json_encode(['status' => 200, 'message' => 'Notifications retrieved successfully', 'data' => $notifications]);
        } else
            echo json_encode(['status' => 400, 'message' => 'No any notification found']);
    }

    public function updateViewedNotification()
    {
        $objNotification = new Notification();
        $updated = $objNotification->updateNotifications(['rawQuery' => 'for_user_id = ?', 'bindParams' => [Session::get('instaffic_user')['id']]], ['notification_status' => 'V']);
        if ($updated)
            echo json_encode(['status' => 200]);
        else
            echo json_encode(['status' => 400]);

    }

    public function showNotifications()
    {
        $objNotification = new Notification();
        $allNotifications = $objNotification->getAllNotifications(['rawQuery' => 'for_user_id = ?', 'bindParams' => [Session::get('instaffic_user')['id']]]);
        foreach ($allNotifications as $notification) {
            $notification->created_at = $this->convertUnixTimeStamp($notification->created_at);
        }

        return view('User::package.notifications', ['allNotifications' => $allNotifications]);
    }

    public function convertUnixTimeStamp($unixTime)
    {
        $diff = time() - $unixTime;
        if ($diff < 1)
            return '0 second';
        $time = [
            365 * 30 * 24 * 60 * 60 => 'year ago',
            30 * 24 * 60 * 60 => 'month ago',
            7 * 24 * 60 * 60 => 'week ago',
            24 * 60 * 60 => 'day ago',
            60 * 60 => 'hour ago',
            60 => 'minute ago',
            1 => 'second ago',
        ];
        $time_plural = [
            'year ago' => 'years ago',
            'month ago' => 'months ago',
            'week ago' => 'weeks ago',
            'day ago' => 'days ago',
            'hour ago' => 'hours ago',
            'minute ago' => 'minutes ago',
            'second ago' => 'seconds ago'
        ];

        foreach ($time as $key => $val) {

            $res = $diff / $key;

            if ($res >= 1) {
                $res = round($res);
                return $res . ' ' . (($res > 1) ? $time_plural[$val] : $val);
            }

        }
    }

    // FUNCTION FOR SEND NOTIFICATION TO IOS DEVICES
    public function sendNotification()
    {
        // Put your device token here (without spaces):
        $deviceToken = 'e22e9bb69b01fe1a0f7ce09d1e882505aa50eacdfdd85bd300d1325bb276b229';

        // Put your private key's passphrase here:
        $passphrase = 'globussoft';

        // Put your alert message here:
        $messageForIOS = 'Saurabh sending Notification';

//        $path = 'D:/virtualdomain/instaffic/web/public/assets/pushNotification/apns_instaffic_development.pem';
//        dd(public_path());
//        $path = public_path() . '/assets/apns_instaffic_development.pem';
        $path = '/home/instaffic/web/public/assets/pushNotification/apns_instaffic_development.pem';
//        dd($path);
        $ctx = stream_context_create();
        stream_context_set_option($ctx, 'ssl', 'local_cert', $path);

        stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

        // Open a connection to the APNS server
        $fp = @stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195', $err,
            $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);

        if (!$fp)
            exit("Failed to connect: $err $errstr" . PHP_EOL);

//        print_r("Saurabh is here");
//        dd($fp);

//                    echo 'Connected to APNS' . PHP_EOL;

        // Create the payload body
        $body['aps'] = array(
            'alert' => $messageForIOS,
            'sound' => 'default',
            'category' => "NEWS_CATEGORY",
        );

        // Encode the payload as JSON
        $payload = json_encode($body);

        // Build the binary notification
        $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

        // Send it to the server
        $result = fwrite($fp, $msg, strlen($msg));

        if (!$result)
            echo 'Message not delivered' . PHP_EOL;
        else
            echo 'Message successfully delivered' . PHP_EOL;

        // Close the connection to the server
        fclose($fp);


        //start the code for saving notification in db


    }
}
