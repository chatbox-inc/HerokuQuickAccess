<?php
/**
 * Created by PhpStorm.
 * User: unilorn
 * Date: 2017/08/24
 * Time: 16:23
 */

namespace App\Service;


class HerokuApi
{
    private $authorization_token;

    /**
     * HerokuApi constructor.
     * @param $access_token
     * @param $token_type
     */
    public function __construct($access_token,$token_type)
    {
        $this->authorization_token = $token_type." ".$access_token;
    }

    public static function oauthToken($code)
    {
        $url = "https://id.heroku.com/oauth/token";
        $content = http_build_query([
            'grant_type' => 'authorization_code',
            'code' => $code,
            'client_secret' => env('HEROKU_OAUTH_SECRET')
        ]);
        $header = [
            "Content-Type: application/x-www-form-urlencoded"
        ];
        $options = array('http' => array(
            'method' => 'POST',
            'header' => implode("\r\n", $header),
            'content' => $content
        ));
        $contents = json_decode(file_get_contents($url, false, stream_context_create($options)));
        return $contents;
    }

    public function app(){
        return $this->getRequest("https://api.heroku.com/apps");
    }

    protected function getRequest($url,array $content = []){
        $content = http_build_query($content);
        $header =[
            "Accept: application/vnd.heroku+json; version=3",
            "Authorization: ".$this->authorization_token,
            "Content-Type: application/json"
        ];

        $options = array('http' => array(
            'method' => 'GET',
            'header' => implode("\r\n", $header),
            'content' => $content
        ));
        return json_decode(file_get_contents($url, false, stream_context_create($options)));
    }
}