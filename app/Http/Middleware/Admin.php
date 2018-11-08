<?php

namespace App\Http\Middleware;

use App\Entity\Role;
use Closure;

class Admin
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
        $user = $request->user();

        if ($user && $user->role === Role::ROLE_ADMIN) {
            return $next($request);
        }

        return redirect()->route('home');
    }
}
