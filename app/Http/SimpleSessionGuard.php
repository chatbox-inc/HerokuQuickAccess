<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2017/06/29
 * Time: 12:22
 */

namespace App\Http;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class SimpleSessionGuard implements Guard
{
    protected $request;

    protected $user;

    /**
     * SimpleSessionGuard constructor.
     *
     * @param Request $request
     * @internal param $service
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function check()
    {
        return $this->user();
    }

    public function guest()
    {
        return !(bool)$this->user();
    }

    public function user()
    {
        if (is_null($this->user) && $this->request->hasSession()) {
            $this->user = $this->request->session()->get("AUTH_USER");
        }
        return $this->user;
    }

    public function id()
    {
        return $this->user()->id;
    }

    public function validate(array $credentials = [])
    {
        return false;
    }

    public function setUser(Authenticatable $user)
    {
        if ($this->request->hasSession()) {
            $this->request->session()->put("AUTH_USER", $user);
        };
        $this->user = $user;
    }

    public function logout()
    {
        $this->request->session()->forget("AUTH_USER");
    }
}
