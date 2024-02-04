<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category_add()
    {
        return view('category/category_add');
    }
    public function category_request(Request $request)
    {
        $request->validate([
            'cat_name' => "required|unique:category",
        ]);
        //  $category = new Category;

        /* 
        $category->cat_name = $request->cat_name;
        $category->category_slug = strtolower(str_replace(' ', '-', $request->cat_name));
        $category->save();
          */
        Category::insert([
            "cat_name" => $request->cat_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->cat_name)),
        ]);
        return redirect('admin/category')->with('success', 'Category Added Successfully!');
    }

    public function category()
    {
        $category = Category::orderByDesc('id')->get();
        return view('category/index', compact('category'));
    }

    public function category_delete($id)
    {
        $category = Category::findOrFail($id);

        $te = $category->sub_category_count;

        if (empty($te)) {
            $category->delete();
            return redirect()->back()->with('success', 'Resource deleted successfully.');
        } else {
            return redirect()->back()->withErrors('first of child deleted.');
        }


        /*   $category->delete();
        return redirect()->back()->with('success', 'Resource deleted successfully.'); */
    }

    public function category_update($id)
    {
        $category = Category::where('id', $id)->first();
        return view('category/update', compact('category'));
    }

    public function update_request(Request $request)
    {
        $category = Category::find($request->id);
        $category->cat_name = $request->cat_name;
        $category->save();
        return redirect('admin/category')->with('success', '  Form submitted successfully!');
    }
}
