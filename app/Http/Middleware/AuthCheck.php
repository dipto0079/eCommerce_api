<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthCheck
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
        if (!$request->Session()->has('LoggedUser')){
//            return redirect('login')->with('fail','You must Logged In');
            $notification=array(
                'messege'=>'You Must Log In !',
                'alert-type'=>'error'
            );
            return redirect()->route('login')->with($notification);
        }
        return $next($request);
    }
}
