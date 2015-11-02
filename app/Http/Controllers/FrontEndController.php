<?php
namespace App\Http\Controllers;
use Cookie;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\CommentEvent;

class FrontEndController extends Controller{
	//post login fb
	public function login(Request $request){
		$res = $request->input("response");

		$check = User::CheckUser($res['id']);
		if ($check == false) {
			//tài khoàn fb người dùng chưa đăng kí
			$result = User::CreateUser($res);
			$response = new \Illuminate\Http\Response(view('layout.index'));
			$response->withCookie(cookie()->forever('user', $result));
		}else{
			$response = new \Illuminate\Http\Response(view('layout.index'));
			$response->withCookie(cookie()->forever('user', $check));
		}
	}

	//get view trang chủ
	public function mainview(Request $request){
		if($request->cookie('user') == null){
			return view('layout.master');
		}else{
			dd($request->cookie('user'));
		}
	}

	//get view trang chủ
	public function homeview(Request $request){
		return view('mainpage');
	}
}