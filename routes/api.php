<?php

use Illuminate\Http\Request;
use HerokuClient\Client as HerokuClient;

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

Route::get('app',function(){
    $heroku = new HerokuClient([
        'apiKey' => env('HEROKU_API_KEYS')
    ]);

    $applist = $heroku->get('apps');
    return json_encode($applist);
});