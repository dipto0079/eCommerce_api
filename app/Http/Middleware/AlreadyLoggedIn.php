<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AlreadyLoggedIn
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
        if (Session()->has('LoggedUser') && (url('login') == $request->url() || url('register') == $request->url() )){
//            return back();
            $notification=array(
                'messege'=>'You First Log Out !',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
        return $next($request);
    }
}
