<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
  use GeneralTrait;
  public function login(Request $request)
  {
    $rules = [
      'email' => "required|exists:admins,email",
      'password' => 'required'
    ];

    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
      $code = $this->returnCodeAccordingToInput($validator);
      return $this->returnValidationError($code, $validator);
    }

    $credentials = $request->only(['email', 'password']);
    $token = Auth::guard('admin-api')->attempt($credentials);
    if (!$token) return $this->returnError('E001', 'wrong credentials');

    $admin = Auth::guard('admin-api')->user();
    $admin->token = $token;
    return $this->returnData('admin', $admin);
  }

  public function logout(Request $request)
  {
    $token = request()->header('auth-token');
    if ($token) {
      try {
        JWTAuth::setToken($token)->invalidate();
        return $this->returnSuccessMessage('logged out successfully');
      } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
        return $this->returnError('', 'something went wrong');
      }
    } else {
      return $this->returnError('', 'Invalid Token');
    }
  }
}
