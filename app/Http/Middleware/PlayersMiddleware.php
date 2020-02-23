<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\If_;

class PlayersMiddleware
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
        if (Auth::user()->type == 'player')
        {
            return $next($request);
        }
        else
        {
            return redirect('/')->with('status','You are not allowed to the Players panel');
        }
    }
}
