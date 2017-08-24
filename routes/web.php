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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return view('test');
});
Route::get('heroku/oauth',function(Request $request,UserEloquent $user){
    $url = "https://id.heroku.com/oauth/token";
    $data = array(
        'grant_type'=>'authorization_code',
        'code'=>$request->input("code"),
        'client_secret'=>env('HEROKU_OAUTH_SECRET')
    );
    $content = http_build_query($data);

    $header = array(
        "Content-Type: application/x-www-form-urlencoded"
    );

    $options = array('http' => array(
        'method' => 'POST',
        "header"  => implode("\r\n", $header),
        'content' => $content
    ));
    $contents = json_decode(file_get_contents($url, false, stream_context_create($options)));
    $user = $user->findById($contents->user_id);
    if(!$user instanceof  UserEloquent) {
        $user = new UserEloquent();
        $user->heroku_id = $contents->user_id;
        $user->save();
    }
    Auth::guard()->setUser($user);
    return redirect('/');

});
Route::get('/logout',function(){
    Auth::guard()->logout();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
