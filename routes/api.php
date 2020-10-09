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

Route::post('/v1/login', 'LoginController@login');
Route::get('/v1/refresh', 'LoginController@refresh');

Route::group(['middleware' => 'jwt.verify'], function () {
    Route::prefix('v1')->group(function () {
        Route::apiResource('students', 'StudentController');
        Route::apiResource('users', 'UserController');
    });
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
