<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	/* if(Cookie::get('user') != null){
		return view('layout.master');
	}else{
    	return view('mainpage');
    } */
	return view('layout.master');
});
Route::get('/home', function () {
	/* if(Cookie::get('user') != null){
		return view('layout.master');
	}else{
    	return view('mainpage');
    } */
	return view('layout.master');
});
Route::get('/profile', function () {
    return view('profile');
});

Route::get('/modal', function () {
    return view('modal');
});
Route::post('/photo','PostController@view');
Route::controller('/facebook','FaceBookController');