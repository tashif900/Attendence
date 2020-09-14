<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources(['user'=>'API\UserController']);
Route::apiResources(['attendence'=>'API\AttendenceController']);

Route::get('statusURL','API\AttendenceController@find_check_in_out_status');
Route::get('checkInURL', 'API\AttendenceController@check_in');
Route::get('checkOutURL', 'API\AttendenceController@check_out');