<?php

namespace App\Http\Middleware;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle(Request $request, Closure $next): Response
{
    if (!Auth::check() || !Auth::user()->is_admin) {
        abort(403, 'Unauthorized access.');
    }
    return $next($request);
}
    
   

}
//use App\Models\User;
//User::create([
  //  'name' => 'tXtAdmin',
    //'email' => env('ADMIN_EMAIL', 'eggplant@txt.com'),
    //'password' => bcrypt(env('ADMIN_PASSWORD', 'Xml@2023*-Tcsupport@4321nvx')),
    //'is_admin' => true,
//]);


