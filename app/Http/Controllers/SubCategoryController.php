<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sub_category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategory = DB::table('category')
            ->join('sub_category', 'category.id', '=', 'sub_category.category_id')
            ->select('sub_category.*', 'category.cat_name as c_name')
            ->get();
        return view('subcategory/index', compact('subcategory'));
    }

    public function subCategory_add()
    {
        $category = DB::table('category')->orderByDesc('id')->get();
        return view('subcategory/subcategory_add', compact('category'));
    }

    public function subcategory_request(Request $request)
    {
        $validatedData = $request->validate([
            // "category_name" => "required",
            "sub_category_name" => "required",
            "subcategory_product_count" => "required"
        ]);

        $category_id = $request->category_id;
        //    $category_name = sub_category::where('id', $category_id);

        /*     print_r($category_name);
        die(); */

        Sub_category::insert([
            "sub_category_name" => $request->sub_category_name,
            //  "category_name" => $category_name,
            "category_id" => $category_id,
            "subcategory_product_count" => $request->subcategory_product_count,
            "slug" =>  strtolower(str_replace(' ', '-', $request->sub_category_name))
        ]);
        Category::where('id', $category_id)->increment('sub_category_count', 1);
        return redirect()->back()->with(['success' => 'Category added successfully!']);
    }

    public function subcategory_delete($id)
    {

        /*  $sub_category = Sub_category::where('id',$id)->first();

        $sub_cat_id = $sub_category->category_id;
        DB::table('category')->where('id',$sub_cat_id)->decrement('sub_category_count',1);
        $sub_category->delete();
        return redirect()->back()->with(["success" => "Sub category deleted successfully!"]); */



        $sub_category = Sub_category::where('id', $id)->first();

        if ($sub_category) 
        {
            // Assuming 'category_id' is the foreign key in the 'sub_categories' table
            $category_id = $sub_category->category_id;

            // Decrement 'sub_category_count' in the 'category' table
            DB::table('category')->where('id', $category_id)->decrement('sub_category_count', 1);

            // Optionally, you can delete the sub-category
            $sub_category->delete();

            
            return redirect()->back()->with(["success" => "Sub category deleted successfully!"]);
        }
            else
            {
                return redirect()->back()->with(["error" => "Sub category not found!"]);
            }
        return redirect()->back()->with(["success" => "Sub category deleted successfully!"]);
    }

    public function update(Request $request)
    {
        $category = Category::orderbydesc('id')->get();
        $sub_category = Sub_category::findOrFail($request->id);
        return view('subcategory/update', compact('category','sub_category'));
    }


    public function subcategory_update(Request $request)
    {
        $sub_cat = Sub_category::where($request->id)->first(); 
        $sub_cat->sub_category_name = $request->sub_category_name;
        $sub_cat->subcategory_product_count = $request->subcategory_product_count;
        $sub_cat->category_id = $request->category_id;
        $sub_cat->slug = str_replace(' ','-', $request->sub_category_name);
        $sub_cat->save();
        return redirect()->back()->with(["success" => 'Sub Category hase been updated successfull!']);
    }
}
