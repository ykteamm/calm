<?php

namespace App\Http\Middleware;

use App\Enums\UserTypeEnum;
use Closure;
use Illuminate\Http\Request;

class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $type)
    {
        return $next($request);
        // $user = $request->user();
        // dd($user);
        // $usertype = UserTypeEnum::getLabel($user->type);
        // if($type && $usertype == $type){
        // } else {
        //     // abort(code: 403, message: "must");
        // }
    }
}
