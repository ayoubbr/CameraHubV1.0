<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate();

        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        $category = new Category();

        $category->name = $request['name'];
        $category->description = $request['description'];

        // dd($category);

        $category->save();

        return redirect()->route('categories')->with('message', 'Category saved successfully');
    }
}
