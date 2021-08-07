<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Traits\CategoryTrait;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
  use CategoryTrait;
  public function index()
  {
    $categories = Category::select('id', app()->getLocale() . '_name as name')->get();
    return $this->returnData('categories', $categories);
  }

  public function getCategoryById(Request $request)
  {
    $category = Category::select('id', app()->getLocale() . '_name as name')->where('id', $request->id)->get();
    if ($category->isEmpty()) {
      return $this->returnError("001", "Invalid category id");
    }
    return $this->returnData('category', $category, 'category is fetched successfully');
  }

  public function changeCategoryStatus(Request $request)
  {
    Category::where('id', $request->id)->update(['active' => $request->active]);
    return $this->returnSuccessMessage('category active state is updated successfully');
  }
}
