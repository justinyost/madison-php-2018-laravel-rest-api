<?php

namespace App\Http\Middleware;

use Closure;
use Cache;

class CacheApi
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
        if (Cache::has('key')) {
            dd(Cache::get('key'));
        } else {
            Cache::remember('key', 1, function () {
                return time();
            });
        }

        return $next($request);
    }
}
