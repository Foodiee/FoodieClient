<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Models\User;
class UserController extends Controller {

    public function callback() {

        $app_id = "1510346915949673";
        $app_secret = "330c492a203540f34ec2ff912c5a1522";
        $redirect_uri = urlencode("http://localhost/laravel-master/public/callback");
        // Get code value
        $code = $_GET['code'];
        // Get access token 
        $facebook_access_token_uri = "https://graph.facebook.com/oauth/access_token?client_id=$app_id&redirect_uri=$redirect_uri&client_secret=$app_secret&code=$code";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $facebook_access_token_uri);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        curl_close($ch);
        $access_token = str_replace('access_token=', '', explode("&", $response)[0]);
        // Get user infomation
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/me?access_token=$access_token&fields=id,name,picture"); // lấy id, name, avatar
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        curl_close($ch);
        $user = json_decode($response);
        // kiểm tra có trong DB hay k 
        $data = DB::table('users')->where('fbid', $user->id)->get();
        if ($data == null) {
           $id = DB::table('users')->insertGetId(['fbid' => $user->id, 'name' => $user->name, 'avatar_link' => $user->picture->data->url]);
           echo $id;
        } else {
//                echo '<pre>';
//print_r($data[0]->UserID);
//echo '</pre>';
            $id=$data[0]->UserID;
            DB::table('users')->where('UserID', $id)->update(['avatar_link' => $user->picture->data->url]);
        }
        session_start();
        $_SESSION['user_status'] = true;
        $_SESSION['user_id'] = $id;
    }
    public function getUser($user_name)
    {
        $user = User::getUserByName($user_name);
        if($user)
            return response()->view('profile',["user"=>$user]);
        else 
            return response()->json("Not found");
    }
    public function logout()
    {
        if(Auth::check())
		{
			Auth::logout();
            return redirect()->route('timeline');
		}
        else 
            echo "Already logout";
    }
}
