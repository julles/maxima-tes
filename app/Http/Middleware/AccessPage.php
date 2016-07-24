<?php

namespace App\Http\Middleware;

use Closure;
use Helper;
class AccessPage
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
        if(auth()->user()->status == 'owner')
        {
            $pages = array_keys(Helper::setMenusOwner());
        }else{
            $pages = array_keys(Helper::setMenusRenter());
        }
        
        $url = request()->segment(1);

        if(in_array($url , $pages))
        {
             return $next($request);
        }else{
            abort(404);
        }

    }
}
