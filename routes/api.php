<?php

use App\Models\AppEloquent;
use App\Service\HerokuApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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

Route::get('app',AppController::class."@index");
Route::get('app/refresh',AppController::class."@refresh");
Route::get('app/raw',AppController::class."@raw");


Route::get('tag',\App\Http\Controllers\TagController::class."@index");
Route::post('tag',\App\Http\Controllers\TagController::class."@store");
Route::delete('tag/{id}',\App\Http\Controllers\TagController::class."@destroy");
Route::patch('tag/{id}',\App\Http\Controllers\TagController::class."@update");
