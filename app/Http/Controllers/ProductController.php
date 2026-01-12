<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Images;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(5);
        $categories = Category::all();
        $images = Images::all();
        return view('dashboard.Admin.Product.Index', compact('products','categories','images'));
    }

    public function create()
    {
    $categories = Category::all(); // Replace `Category` with your actual model name for categories
    $subcategories = SubCategory::all(); 
    return view('dashboard.Admin.Product.Create', compact('categories','subcategories'));
      }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'description' => 'required',
        'coins' => 'required',
        'category_id' => 'required',
        'subcategory_id' => 'required',
    ]);

    $product = new Product();
    $product->name = $request->name;
    $product->price = $request->price;
    $product->coins = $request->coins;
    $product->description = $request->description;
    $product->category_id = $request->category_id;
    $product->subcategory_id = $request->subcategory_id;
    $product->save();

if ($request->hasFile('image')) {
    $uploadFolder = 'images/products_image';

    foreach ($request->file('image') as $file) {
        $imageName = time() . '_' . $file->getClientOriginalName();
        $file->move($uploadFolder, $imageName);

        $image = new Images([
            'product_id' => $product->id,
            'image' => $imageName,
        ]);
        $image->save(); // Save the image to the database
    }
}
    return redirect()->route('Product.Index');}


    public function edit(Request $request, $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $subcategories = SubCategory::all(); 
        return view('dashboard.Admin.Product.Edit', compact('product','categories','subcategories'));
    }
 
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'coins' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
        ]);
        $product = Product::find($id);
        if (empty($product)) {
            return redirect()->route('Product.Index')->with('error', 'العنصر غير موجود');
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->coins = $request->coins;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        
        if ($request->hasFile('image')) {
            $images = [];
    
            foreach ($request->file('image') as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $images[] = $imageName;
                $extenation = strtolower($file->extension());
                $fileName = time() . '_' . $extenation;
                $file->move("images/products_image", $fileName);
                $images[] = $fileName;
            }
    
            $product->image = json_encode($images);
        }

        $product->save();
        return redirect()->route('Product.Index');
    }

    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);
        if (empty($product)) {
            return redirect()->route('Product.Index');
        }
        $product->delete();
        return redirect()->route('Product.Index')->with('success', 'تم الحذف بنجاح');
    }

    public function getSubcategories(Request $request, $categoryId)
    {
        $subcategories = SubCategory::where('category_id', $categoryId)->get();
        return response()->json($subcategories);
    }
    
  
}
