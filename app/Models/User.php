<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class User extends Model{
    protected $table = 'users';

    //lưu thông tin người sử dụng vào db
    public static function CreateUser($response){
        $user = new User();
        $user->fb_id = $response['id'];
        $user->name = $response['name'];
        $user->gender = $response['gender'];
        $user->birthday = $response['birthday'];
        $user->save();
        return $user;
    }

    //kiểm tra người dùng có tồn tại hay không theo fb_id
    public static function CheckUser($fb_id){
        $result = User::where('fb_id', $fb_id)->first();

        if($result){
            return $result;
        }else{
            return false;
        }
    }
}
