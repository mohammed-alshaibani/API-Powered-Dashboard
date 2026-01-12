<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
   /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $categories = Category::orderBy('id')->get();
        return response()->json($categories);
    }
}
