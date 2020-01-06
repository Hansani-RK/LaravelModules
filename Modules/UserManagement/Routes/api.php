<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/usermanagement', function (Request $request) {
    return $request->user();
});

Route::get('user', 'UserManagementController@index');
Route::post('user/create', 'UserManagementController@store');
Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.reset');
Route::post('password/reset', 'ResetPasswordController@reset');

Route::group(['middleware' => 'auth:api'], function () {
    Route::patch('user/update/{id}', 'UserController@update');
    Route::post('user/logout', 'UserController@logout');
});

//Route::get('permission', 'PermissionController@index');
