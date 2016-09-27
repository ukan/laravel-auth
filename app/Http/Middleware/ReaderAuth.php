<?php

namespace App\Http\Middleware;

use Closure, Auth;

class ReaderAuth
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
          if(Auth::guest()) {
            return redirect('login');
          } elseif (Auth::user()->role == 'reader') {
            return $next($request);
          } else {
            return response('Unauthorized.', 401);
          }
    }
}
