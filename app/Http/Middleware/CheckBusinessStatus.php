<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBusinessStatus
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
        $response = $next($request);
        $account = $request->user()->business;
        if($account->business_status < 1){
            return redirect()->route('account.suspended');
        }elseif(!auth()->user()){
            return redirect()->route('login');
        };
        return $response;
    }
}
