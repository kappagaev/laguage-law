<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminCreateRequests
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

        $rol = $request->get('role_id');

        if ( $rol->can_approve_users == 0 ) {
            redirect('welcome'); // Не знаю просто куди перенаправляти якщо що
        }

        return $next($request);
    }
}
