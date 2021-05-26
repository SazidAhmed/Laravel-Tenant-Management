<?php

namespace App\Http\Middleware;
use App\Traits\permissionTrait;
use Closure;

class HasPermission
{
    use permissionTrait;
    
    public function handle($request, Closure $next)
    {
        $this->hasPermission();
        return $next($request);
    }
}
