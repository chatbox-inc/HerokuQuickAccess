<?php

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

use App\Models\UserEloquent;
use App\Service\HerokuApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return view('test');
});
Route::get('heroku/oauth',function(Request $request,UserEloquent $user){
    $contents = HerokuApi::oauthToken($request->code);

    $user = $user->findById($contents->user_id);
    if(!$user instanceof  UserEloquent) {
        $user = new UserEloquent();
        $user->heroku_id = $contents->user_id;
        $user->refresh_token = $contents->refresh_token;
        $user->access_token = $contents->access_token;
        $user->token_type = $contents->token_type;
        $user->save();
    }

    Auth::guard()->setUser($user);
    return redirect('/');
});
Route::get('/logout',function(){
    Auth::guard()->logout();
    return redirect('/');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
