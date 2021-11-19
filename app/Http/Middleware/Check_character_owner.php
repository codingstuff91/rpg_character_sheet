<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Check_character_owner
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
        // dd($request->character_id);
        if(auth()->user()->id == $request->character_id || auth()->user()->role != "joueur")
        {
            return $next($request);
        }

        abort(401);
    }
}
