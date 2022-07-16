<?php

namespace App\Http\Middleware;

use App\Models\Form;
use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        abort_if($role != auth()->user()->role->label, 403);
        return $next($request);
    }
}
