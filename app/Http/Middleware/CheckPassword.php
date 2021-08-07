<?php

namespace App\Http\Middleware;

use Closure;

class CheckPassword
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   */
  public function handle($request, Closure $next)
  {
    if ($request->api_password === null || $request->api_password !== env('API_PASSWORD')) {
      return response()->json(['message' => 'Unauthenticated']);
    }
    return $next($request);
  }
}
