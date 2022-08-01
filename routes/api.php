<?php

use App\Http\Controllers\Api\SchoolsApiController;
use App\Http\Controllers\Api\StudentsApiController;
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


Route::group(['prefix'=> 'schools'], function(){
    Route::get('/', [SchoolsApiController::class, 'index']);
    Route::post('/store', [SchoolsApiController::class, 'store']);
    Route::post('/update', [SchoolsApiController::class, 'update']);
    Route::post('/delete', [SchoolsApiController::class, 'delete']);
});

Route::group(['prefix'=> 'students'], function(){
    Route::get('/', [StudentsApiController::class, 'index']);
    Route::post('/store', [StudentsApiController::class, 'store']);
    Route::post('/update', [StudentsApiController::class, 'update']);
    Route::post('/delete', [StudentsApiController::class, 'delete']);
});
