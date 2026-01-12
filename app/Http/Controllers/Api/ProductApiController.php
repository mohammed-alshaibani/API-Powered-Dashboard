<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Images;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    /**
     * Display all products based on category.
     *
     * @param  int  $Id
     * @return \Illuminate\Http\Response
     */
    public function showByCategory($Id)
    {
        $category = Category::find($Id);

        if (!$category) {
            return response()->json(['message' => 'القسم غير موجود'], 404);
        }

        $products = Product::where('category_id', $Id)->get();

        return response()->json($products);
    }

    /**
     * Display detailed information about a specific product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Id)
    {
        $product = Product::find($Id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $category = Category::find($product->category_id);
        $subcategory = SubCategory::find($product->subcategory_id);
        $images = Images::where('product_id', $product->Id)->get();

        $productData = [
            'product' => $product,
            'category' => $category,
            'subcategory' => $subcategory,
            'images' => $images,
        ];

        return response()->json($productData);
    }
}

