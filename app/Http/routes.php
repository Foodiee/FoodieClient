<?php
Route::get('/profile', function () {
    return view('profile');
});

Route::get('/modal', function () {
    return view('modal');
});

Route::get('/', ['as'=>'timeline','uses'=>'FrontEndController@mainview']);
Route::get('/home', ['as'=>'home','uses'=>'FrontEndController@homeview']);
Route::get('/an-gi-bay-gio', 'FrontEndController@searchfoodview');
Route::get('/search','SearchController@view');
Route::post('facebook/login', 'FrontEndController@login');
Route::post('/upload-img', 'FrontEndController@uploadimg');
Route::post('/upload-post', 'FrontEndController@uploadpost');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('login', function (){
    return view('login.login');
});
Route::get('register', function (){
    return view('login.register');
});
Route::get('callback','LoginController@callback');
Route::post('register',['as'=>'sendRegister', 'uses'=>'LoginController@register']);
// Route::post('login',['as'=>'postLogin', 'uses'=>'Auth\AuthController@login']);
Route::post('postLogin',['as'=>'postLogin', 'uses'=>'LoginController@login']);