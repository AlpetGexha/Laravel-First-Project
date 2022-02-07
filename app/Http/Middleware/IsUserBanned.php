<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IsUserBanned
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
        if (auth()->check() && auth()->user()->banned_till != null) {

            // Permanent ban    
            if (auth()->user()->banned_till == 0) {
                $message = 'Llogaria juaj është ndaluar përgjithmonë.';
            }
            // Limit Ban
            if (now()->lessThan(auth()->user()->banned_till)) {
                $banned_days = now()->diffInDays(auth()->user()->banned_till) + 1;
                $message = 'Llogaria juaj është suspeduar për ' . $banned_days . ' ' . Str::plural('ditë', $banned_days);
            }   

            // Logout if user is banned
            auth()->logout();
            return redirect()->route('login')->with('status', $message);
        }
        return $next($request);
    }
}
