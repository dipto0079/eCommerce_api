<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomerAuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->Session()->has('customerLogged')){
            $notification=array(
                'messege'=>'You Must Log In !',
                'alert-type'=>'error'
            );
            return redirect()->route('/')->with($notification);
        }
        return $next($request);
    }
}
