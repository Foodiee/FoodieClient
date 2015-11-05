<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Authenticatable;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email','fbid','account'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    use Authenticatable, CanResetPassword;
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
