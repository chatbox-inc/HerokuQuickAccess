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

Route::get('app', function () {
    if($user = Auth::guard()->user()){
        $app = AppEloquent::where("heroku_id",$user->heroku_id)->get();
        return $app->toArray();
    }
    else{
        return abort(401);
    }
});

Route::get('app/refresh', function () {
    if (Auth::check()) {
        $user = Auth::guard()->user();
        $heroku = new HerokuApi($user->access_token, $user->token_type);
        $app = $heroku->app();
        foreach ($app as $app_data) {
            $app_db = AppEloquent::find($app_data->id);
            if (!$app_db) {
                $app_db = new AppEloquent();
            }
            $app_db->id         = $app_data->id;
            $app_db->heroku_id  = $user->heroku_id;
            $app_db->name       = $app_data->name;
            $app_db->web_url    = $app_data->web_url;
            $app_db->save();
        }
        return abort(200);
    } else {
        return abort(401);
    }
});