<?php

namespace App\Http\Controllers;

use App\Models\AppEloquent;
use App\Service\HerokuApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{

    /**
     * @return array|void
     */
    public function index()
    {
        if($user = Auth::guard()->user()){
            $app = AppEloquent::where("heroku_id",$user->heroku_id)->get();
            return $app->toArray();
        }
        else{
            return abort(401);
        }
    }

    /**
     * HerokuAppをDBに反映
     */
    public function refresh(){
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
    }

    public function raw(){
        if (Auth::check()) {
            $user = Auth::guard()->user();
            $heroku = new HerokuApi($user->access_token, $user->token_type);
            $app = $heroku->app();
            return $app;
        } else {
            return abort(401);
        }
    }
}
