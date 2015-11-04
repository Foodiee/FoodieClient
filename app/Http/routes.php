<?php

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/modal', function () {
    return view('modal');
});

Route::get('/', 'FrontEndController@mainview');
Route::get('/home', 'FrontEndController@homeview');
Route::get('/an-gi-bay-gio', 'FrontEndController@searchfoodview');
Route::get('/search','SearchController@view');
Route::post('facebook/login', 'FrontEndController@login');
Route::post('/upload-img', 'FrontEndController@uploadimg');
Route::post('/upload-post', 'FrontEndController@uploadpost');