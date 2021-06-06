<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthBasicStatic
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //header('HTTP/1.1 401 Unauthorized'); // clear bad login

        if (empty($_SERVER['PHP_AUTH_USER'])) {
            $this->auth();
        } else {
            if ($_SERVER['PHP_AUTH_USER'] == config('auth.basic_login')
                && $_SERVER['PHP_AUTH_PW'] == config('auth.basic_password')
            ) {
                return $next($request);
            } else {
                $this->auth();
            }
        }

        return $next($request);
    }


    /**
     * Send auth header
     */
    private function auth() {
        header('WWW-Authenticate: Basic realm="Admin area"');
        header('HTTP/1.0 401 Unauthorized');

        die('Unauthorized');
    }
}
