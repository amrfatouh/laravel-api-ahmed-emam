<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use Illuminate\Support\Facades\Validator;

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
  }
}
