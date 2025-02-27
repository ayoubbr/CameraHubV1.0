<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::all();
        $products = Product::all();

        return view('products.index', compact('products', 'subCategories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'unit' => 'required|max:255',
            'image' => 'required|url',
            'price' => 'numeric|min:0|not_in:0',
            'stock' => 'numeric|min:0|not_in:0',
            'subcategory_name' => 'required'
        ]);

        $product = new Product();

        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->unit = $request['unit'];
        $product->price = $request['price'];
        $product->stock = $request['stock'];
        $product->image = $request['image'];
        $product->admin_id = auth()->user()->id;

        $subCategory  = SubCategory::where('name', $request['subcategory_name'])->get();

        $product->subcategory_id = $subCategory[0]->id;

        $product->save();

        return redirect()->route('products')->with('message', 'Product saved successfully');
    }
}
