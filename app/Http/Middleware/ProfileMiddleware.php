<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ProfileMiddleware
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
        $user_id = $request->user_id;

        if(Auth::check()){
            if($user_id == Auth::user()->id){
                return $next($request);
            }else{
                return redirect('/account/' . Auth::user()->id);
            }
        }else{
            return redirect('/');
        }

    }
}
