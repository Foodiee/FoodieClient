<?php

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/modal', function () {
    return view('modal');
});

Route::get('/', ['as'=>'timeline','uses'=>'FrontEndController@mainview']);
Route::get('/home', ['as'=>'home','uses'=>'FrontEndController@homeview','middleware'=>'auth']);
Route::get('/an-gi-bay-gio', 'FrontEndController@searchfoodview');
Route::group(['prefix'=>'search'],function()
{
	Route::get('user','SearchController@searchUser');
	Route::get('board','SearchController@searchBoard');
	Route::get('post','SearchController@searchPost');

});
Route::get('post/{post_id}','PostController@getPostById');
Route::group(['prefix'=>'api'],function()
{
	Route::resource('board','BoardController');
	Route::resource('post','PostController');
	Route::resource('photo','StorageController');
});
Route::post('facebook/login', 'FrontEndController@login');
Route::post('/upload-img', 'FrontEndController@uploadimg');
Route::post('/upload-post', 'FrontEndController@uploadpost');
Route::post('/load-more', 'FrontEndController@loadmore');
Route::post('/detail-image', 'FrontEndController@detailimage');
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
Route::post('login',['as'=>'postLogin', 'uses'=>'LoginController@login']);
// Route::post('postLogin','LoginController@login');
Route::get('logout','UserController@logout');