<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class AdminMiddleware extends BaseMiddleware
{
    public function handle($request, Closure $next)
    {
        if(JWTAuth::parseToken()->authenticate()->is_admin != 1 ){
            return response()->json([
                'success' => false,
                 'message' => 'You Are Not Admin'
            ],401);
        }

        return $next($request);
    }
}
