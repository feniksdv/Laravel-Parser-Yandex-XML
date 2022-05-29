<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class Admin
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
        $checkUserIsAdmin = User::where('id', '=', \Auth::user()->id)->with('customer')->first();
        if($checkUserIsAdmin->customer[0]->is_admin === false){
            abort(404);
        }
        return $next($request);
    }
}
