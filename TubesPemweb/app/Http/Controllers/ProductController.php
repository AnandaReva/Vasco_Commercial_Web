<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

use App\Models\Order_details;
use Illuminate\Http\Request;



class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('products.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::find($id);
        $products = $category->products;
        return view('products.show', compact('products'));
    }

    public function addToCart($id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->photo,
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo,
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

}
