<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use App\Models\User;
use App\Models\Board;
use App\Models\FollowEvent;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }
    public function follow(Request $request)
    {
        $current_user_id = Auth::user()->user_id;
        $user_id = $request->input('following_id');
        $bool = FollowEvent::checkFollowed($current_user_id,$user_id);
        if($bool==false){
            FollowEvent::followUser($current_user_id,$user_id);
            $follow = "followed";
        }
        else {
            FollowEvent::unfollowUser($current_user_id,$user_id);
            $follow = "unfollowed";
        }
        return response()->json(array(
            "result"=>$follow,
            ));
        // return response()->json($book)
    }   
    public function getBoards($user_id)
    {
        $boards = Board::getBoardsByUserId($user_id);
        return response()->json($boards);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

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
        if(Auth::check())
        {
            $current_user_id = Auth::user()->user_id;
            $bool = FollowEvent::checkFollowed($current_user_id,$user["user_id"]);
            if($bool==true)
            {
                $user["follow"]="true";
            }
        }
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
            return redirect()->route('explorer');
        }
        else 
            echo "Already logout";
    }
    public function login(Request $request) {
         
        $auth = array(
          'email' => $request->email,
          'password' => $request->password
        );
        if (Auth::attempt($auth,true)) {
            $result = array(
                "login"=>'true');
              return redirect()->intended('home');
        } else {
            $result = array(
                "login"=>'true');
            echo "sai ten mat khau";
        }
        
    }
    public function getFollowing($user_id)
    {
        $result = FollowEvent::getFollowing($user_id);
        return response()->json($result);
    }
    public function getFollower($user_id)
    {
        $result = FollowEvent::getFollower($user_id);
        return response()->json($result);
    }
}
