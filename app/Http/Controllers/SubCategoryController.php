<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $subCategories = SubCategory::paginate();

        return view('subcategories.index', compact('subCategories', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'category_name' => 'required'
        ]);

        $subCategory = new SubCategory();

        $subCategory->name = $request['name'];
        $subCategory->description = $request['description'];
        $category  = Category::where('name', $request['category_name'])->get();

        $subCategory->category_id = $category[0]->id;

        $subCategory->save();

        return redirect()->route('subcategories')->with('message', 'SubCategory saved successfully');
    }
}
