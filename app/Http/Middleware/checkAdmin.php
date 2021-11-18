<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkAdmin
{

    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if($user && $user->is('admin')){
            return $next($request);
        }else{
            abort(403);
        }

    }
}
