<?php

Route::get('admin/login', ['as' => 'getLogin', 'uses' => 'Code\Auth\LoginController@getLogin']);
Route::post('admin/login', ['as' => 'postLogin', 'uses' => 'Code\Auth\LoginController@postLogin']);


Route::group(['prefix'=>'superadmin', 'middleware'=>'isAdmin'], function (){
    Route::get('superadmin',['as'=>'superadmin',  'uses' => 'SuperAdminController@index']);
    Route::get('create',['as'=> 'superadmin.create', 'uses'=> 'SuperAdminController@create']);
    Route::post('store',['as'=> 'superadmin.store', 'uses'=> 'SuperAdminController@store']);
    Route::delete('destroy/{id}',['as'=> 'superadmin.destroy', 'uses'=> 'SuperAdminController@destroy']);
    Route::get('edit/{id}',['as'=> 'superadmin.edit', 'uses'=> 'SuperAdminController@edit']);

});
Route::group(['prefix'=>'admin','middleware'=>'isAdmin'],function (){
    Route::get('admin', ['as' => 'admin', function () {
        return view('auth.admin');
    }]);

    Route::get('/logout', ['as' => 'getLogout', 'uses' => 'Code\Auth\LoginController@getLogout']);
} );


//Route::get('/redirect/{social}', 'SocialAuthController@redirect');
//Route::get('/callback/{social}', 'SocialAuthController@callback');