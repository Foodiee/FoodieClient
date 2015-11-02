<?php

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/modal', function () {
    return view('modal');
});

Route::get('/', 'FrontEndController@mainview');
Route::get('/home', 'FrontEndController@homeview');

Route::post('facebook/login', 'FrontEndController@login');
