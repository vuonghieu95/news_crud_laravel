<?php

Route::get('/login', ['as'=>'getLogin','uses'=>'Code\Auth\LoginController@getLogin']);
Route::post('/login', ['as'=>'postLogin','uses'=>'Code\Auth\LoginController@postLogin']);

Route::get('/logout', ['as'=>'getLogout','uses'=>'Code\Auth\LoginController@getLogout']);
Route::get('admin',['as'=>'admin',function(){
    return view('auth.admin');
}]);
Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');