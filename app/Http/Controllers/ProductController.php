<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all()
    {
        $subCategories = SubCategory::all();
        $categories = Category::all();
        $products = Product::paginate(6);
        $cart_count = 0;
        if (session('cart') != null) {
            $cart_count = count(session()->get('cart'));
        }

        return view('products.all', compact('products', 'subCategories', 'categories', 'cart_count'));
    }

    public function search(Request $request)
    {
        $subCategories = SubCategory::all();
        $categories = Category::all();

        $search = $request->input('search');

        $products = Product::where('name', 'like', "%$search%")->get();

        return view('products.all', ['products' => $products, 'categories' => $categories, 'subcategories' => $subCategories]);
    }

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

    public function show($id)
    {
        $product = Product::find($id);
        $cart_count = 0;
        if (session('cart')!= null) {
            $cart_count = count(session()->get('cart'));
        }
        $relatedProducts = Product::where('subcategory_id', $product->subcategory->id)->paginate(4);

        return view('products.show', compact('product', 'relatedProducts', 'cart_count'));
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $product = Product::find($productId);

        if (!$product) {
            return redirect()->route('products.all')->with('error', 'Product not found!');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $cart[$productId]['quantity'] + $quantity;
        } else {

            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->image,
                'subcategory' => $product->subcategory->name,
                'category' => $product->subcategory->category->name,
                'stock' => $product->stock
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('message', 'Product added to cart successfully!');
    }

    public function cart()
    {

        $cart = session()->get('cart', []);

        if (!empty($cart)) {
            foreach ($cart as $id => &$item) {

                if (!isset($item['image']) || !isset($item['subcategory'])) {
                    $product = Product::with('subcategory.category')->find($id);

                    if ($product) {
                        $item['image'] = $product->image;
                        $item['subcategory'] = $product->subcategory->name;
                        $item['category'] = $product->subcategory->category->name;
                        $item['stock'] = $product->stock;
                    }
                }

                if (!isset($item['quantity'])) {
                    $item['quantity'] = 1;
                }
            }

            session()->put('cart', $cart);
            // dd(count($cart));
        }

        $cart_count = count($cart);
        return view('products.cart', compact('cart', 'cart_count'));
    }

    public function removeFromCart(Request $request)
    {
        $productId = $request->input('product_id');

        if ($productId) {
            $cart = session()->get('cart', []);

            if (isset($cart[$productId])) {
                unset($cart[$productId]);
                session()->put('cart', $cart);
            }

            return redirect()->route('cart')->with('message', 'Product removed from cart!');
        }

        return redirect()->route('cart')->with('error', 'Failed to remove product!');
    }
}
