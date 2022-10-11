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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('tests', 'testController');Route::resource('test1s', 'test1Controller');Route::resource('test2s', 'test2Controller');Route::resource('test3s', 'test3Controller');Route::resource('test4s', 'test4Controller');Route::resource('test5s', 'test5Controller');Route::resource('test6s', 'test6Controller');Route::resource('test7s', 'test7Controller');Route::resource('test7s', 'test7Controller');Route::resource('test9s', 'test9Controller');Route::resource('tests', 'testController');Route::resource('test1s', 'test1Controller');Route::resource('test2s', 'test2Controller');