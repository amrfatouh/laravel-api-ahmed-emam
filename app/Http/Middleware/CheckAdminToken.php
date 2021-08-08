<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminToken
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    $user = null;
    try {
      $user = JWTAuth::parseToken()->authenticate();
      //throw an exception

    } catch (\Exception $e) {
      if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
        return response()->json(['success' => false, 'msg' => 'INVALID _TOKEN', 'status' => 200]);
      } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
        return response()->json(['success' => false, 'msg' => 'EXPIRED_TOKEN', 'status' => 200]);
      } else {
        return response()->json(['success' => false, 'msg' => 'Error', 'status' => 200]);
      }
    } catch (\Throwable $e) {
      if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
        return response()->json(['success' => false, 'msg' => 'INVALID _TOKEN', 'status' => 200]);
      } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
        return response()->json(['success' => false, 'msg' => 'EXPIRED_TOKEN', 'status' => 200]);
      } else {
        return response()->json(['success' => false, 'msg' => 'Error', 'status' => 200]);
      }
    }
    if (!$user)
      return response()->json(['success' => false, 'msg' => ""]);
    return $next($request);
  }
}
