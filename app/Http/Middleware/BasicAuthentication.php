<?php namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;
use Illuminate\Contracts\Auth\Guard;
use App\Auth\Guard as AppGuard;

class BasicAuthentication extends AuthenticateWithBasicAuth {

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        //$this->auth = $auth;
        $this->auth = new AppGuard(
            $auth->getProvider(),
            $auth->getSession(),
            $auth->getRequest()
        );

    }
}
