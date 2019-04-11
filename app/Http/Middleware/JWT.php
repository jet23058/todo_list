<?php

namespace App\Http\Middleware;

use Closure;

class JWT
{
    public function handle($request, Closure $next, $guard = null)
    {
        $token = $request->header('Authorization');
        $result = \JWTAuth::verify($token);
        if ($result['result']) {
            \Auth::loginUsingId($result['user']->id);
            return $next($request);
        } else {
            throw new \Exception('jwt token error.');
        }
    }
}
