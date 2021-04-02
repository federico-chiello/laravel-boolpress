<?php

namespace App\Http\Middleware;

use Closure;
use User;

class ApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $api_token = $request->header('authorization');

        $api_token = substr($api_token, 7);

        $user = User::where('api_token', $api_token)->first();
        return $next($request);
    }
}
