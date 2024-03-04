<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use App\Models\Sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function product()
    {
        $product = DB::table('products')->get();
        return view('product/index',compact('product'));
    }

    public function productadd()
    {
        $category = Category::latest()->get();
        $sub_category = Sub_category::latest()->get();
        return view('product/productadd',compact('category','sub_category'));
    }

    public function productadd_request(Request $request)
    {
        $request->validate([
            "name" => "required",
            "short_description" => "required",
            "long_description" => "required",
            "price" => "required",
            "product_category_id" => "required",
            "product_image" => "required",
           
        ]);

        if ($request->file('product_image')) {
            $image = $request->file('product_image');
            $imageName = time().$image->getClientOriginalName(); // Generate a unique name for the image
            $image->move(public_path('product_image'), $imageName);
        }
        $product = new Products();
        $product->name = $request->name;
        $product->product_image = $imageName;
        $product->short_description = $request->short_description;
        $product->price = $request->price;
        $product->product_category_id = $request->product_category_id;
        $product->product_subcategory_id = $request->product_subcategory_id;
        $product->save();
        return redirect()->back()->with(["success"=> 'Your Product Has Been Successfully']);
    }

}
