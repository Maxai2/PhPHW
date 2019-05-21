<?php
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', 'AdminController@index');
    Route::get('/users', 'AdminController@users');
    Route::post('/users/blockUser', 'AdminController@blockUser');
    Route::post('/users/deleteUser', 'AdminController@deleteUser');

    Route::get('/gifts', 'AdminController@gifts');
    Route::post('/gifts/updateGift', 'AdminController@updateGift');
    Route::post('/gifts/deleteGift', 'AdminController@deleteGift');
    Route::post('/gifts/changePic', 'AdminController@changePic');
});

Auth::routes();
