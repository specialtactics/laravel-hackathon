<?php
namespace App\Auth;

use Symfony\Component\HttpFoundation\Request;
use Illuminate\Auth\Guard as IlluminateGuard;

class Guard extends IlluminateGuard {
    /**
     * Env keys for credentials
     */
    const AUTH_USER_EMAIL = 'AUTH_EMAIL';
    const AUTH_USER_PASS = 'AUTH_PASS';

    /**
     * Attempt to authenticate a user using the given credentials.
     *
     * @param  array  $credentials
     * @param  bool   $remember
     * @param  bool   $login
     * @return bool
     */
    public function attempt(array $credentials = [], $remember = false, $login = true)
    {
        if ($credentials['email'] == env(self::AUTH_USER_EMAIL) && $credentials['password'] == env(self::AUTH_USER_PASS)) {
            return true;
        } else {
            return false;
        }
    }


}