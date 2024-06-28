<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$give_role): Response
    {
        $acceptHader = $request->header('Accept');
        $header_akes = strpos($acceptHader,'application/json');
        if(!Auth::check()){
            if($header_akes == true){
                return response()->json([
                    'pesan' => "Silahkan lakukan login terlebih dahulu",
                ],403);
            }
            return abort(403,"Capek deh Login dulu sana !");
        }
        $user_roles = Auth::user()->getRoleNames();
        foreach($user_roles as $role){
            $role = strtolower($role);
            $give_role = strtolower($give_role);
            if($role == $give_role){
                return $next($request);
            }
        }
        return abort(403,"Capek deh Login dulu sana !");
    }
}
