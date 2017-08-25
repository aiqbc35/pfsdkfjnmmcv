<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','HomeController@index');
Route::get('/list/vip','HomeController@vip');
Route::get('/list/public','HomeController@publicVideo');
Route::get('/view','HomeController@view');
Route::get('/login','HomeController@login');
Route::get('/logout','HomeController@logout');
Route::get('/register','HomeController@register');

Route::group(['prefix' => 'api'],function()
{
    Route::get('/home','ApiController@getHome');
    Route::get('/getVip','ApiController@getPrivate');
    Route::get('/getVideo','ApiController@getVideo');
    Route::get('/random','ApiController@random');
    Route::post('/reg','ApiController@reg');
    Route::post('/login','ApiController@login');
    Route::get('/getUser','ApiController@getUser');
    Route::post('/actcode','ApiController@actCode');
});

Route::group(['prefix' => 'member'],function()
{
    Route::get('/index','HomeController@member');
});

Route::group(['prefix' => 'mobile'],function()
{
    Route::get('/','MobileController@index');
    Route::get('/public','MobileController@listPublic');
    Route::get('/view','MobileController@view');
    Route::get('/register','MobileController@register');
    Route::get('/login','MobileController@login');
    Route::get('/member','MobileController@member');
    Route::get('/vip','MobileController@vip');
});


Route::group(['namespace' => 'Admin'],function()
{
    Route::get('/webadminlogin','LoginController@index');
    Route::post('/webadminlogin/gethalt','LoginController@getHalt');


    Route::group(['middleware' => 'adminlogin','prefix'=>'admin'],function()
    {
        Route::get('/htadmin','IndexController@index');
        Route::get('/user','UserController@index');
        Route::get('/vip','UserController@vip');
        Route::get('/setvip','UserController@setVip');
        Route::get('/deleteuser','UserController@delete');
        Route::get('/video','VideoController@index');
        Route::get('/video/setvip','VideoController@setvip');
        Route::get('/video/delete','VideoController@delete');
        Route::get('/videovip','VideoController@vip');
        Route::get('/loading','VideoController@loading');
        Route::get('/video/setok','VideoController@setok');
        Route::get('/videoadd','VideoController@add');
        Route::post('/video/addHalt','VideoController@addHalt');
        Route::get('/links','LinkController@index');
        Route::get('/linksadd','LinkController@add');
        Route::get('/link/delete','LinkController@delete');
        Route::get('/logout','IndexController@logout');
        Route::get('/system','SystemController@index');
        Route::post('/system/addHalt','SystemController@addHalt');
        Route::post('/link/addHalt','LinkController@addHalt');
        Route::get('/code','CodeController@index');
        Route::get('/addcode','CodeController@addcode');
    });



});