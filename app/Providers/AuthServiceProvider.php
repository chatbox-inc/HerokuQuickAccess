<?php

namespace App\Providers;

use App\Http\SimpleSessionGuard;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->app->extend("auth", function (AuthManager $auth) {
            $auth->extend("simple-session", function ($app, $name, $config) {
                return app(SimpleSessionGuard::class);
            });
            return $auth;
        });

        //
    }
}
