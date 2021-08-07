<?php

namespace App\Http\Traits;

use App\Category;

trait CategoryTrait
{
  public function returnError($errNum, $msg)
  {
    return [
      'status' => false,
      'errNum' => $errNum,
      'msg' => $msg,
    ];
  }

  public function returnSuccessMessage($msg = '', $errNum = "S000")
  {
    return [
      'status' => true,
      'errNum' => $errNum,
      'msg' => $msg,
    ];
  }

  public function returnData($key, $value, $msg = '')
  {
    return response()->json([
      'status' => true,
      'errNum' => 'S000',
      'msg' => $msg,
      $key => $value,
    ]);
  }
}
