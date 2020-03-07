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
use App\Models\User;
use App\Models\Post;


Route::group([
    'prefix' => 'admin',
    'middleware' => 'check_auth',
], function () {
    Route::get('/', 'DashBoardController@index')->name('admin')->middleware(['check_role_admin',]);
    // user
    Route::resource('users', 'UserController')->middleware(['check_role_admin',]);
    Route::resource('posts','PostController')->middleware(['check_role_admin',]);
    Route::resource('postImages','PostImagesController')->middleware(['check_role_admin',]);
});

// Auth Admin

Route::group([
    'prefix' => 'admin',
], function(){
    Route::get('login', 'AuthController@getLoginForm');
    Route::post('login', 'AuthController@login')->name('auth.login');
    Route::get('logout','AuthController@logout')->name('auth.logout');
});





