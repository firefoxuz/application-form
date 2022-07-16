<?php

namespace App\Http\Middleware;

use App\Enums\RoleEnum;
use Closure;
use Illuminate\Http\Request;

class SeparateRolesMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $this->isLogined() ? redirect()->route($this->renderRoute()) : $next($request);
    }

    /**
     * @return bool
     */
    private function isLogined(): bool
    {
        return auth()->check();
    }

    /**
     * @return string
     */
    private function renderRoute(): string
    {
        return auth()->user()->role === RoleEnum::manager() ? 'manager.index' : 'index';
    }
}
