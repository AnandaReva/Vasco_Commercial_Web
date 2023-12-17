<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\ProductVariant;

use App\Models\Order_details;
use Illuminate\Http\Request;



class CustomerController extends Controller
{
    public function landing()
    {       /*  $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.category_name')
            ->get();
        $categories = Category::all();
       // dd($products);
        return view('landingView', compact( 'products')); */
        $categories = Category::with('categoryProducts')->get();
        return view('landingView', compact('categories'));
    }



    public function showCategoryProducts($idCategory)
    {
        // Retrieve category products based on $idCategory
        $categoryProducts = Category::find($idCategory)->categoryProducts;

        return view('categoryProducts', compact('categoryProducts'));
    }


    public function showProduct($idProduct)
    {


        $product = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.category_name')
            ->where('products.id', $idProduct)
            ->first();
        /* 
        $productVariants = ProductVariant::join('colors', 'product_variants.color_id', '=', 'colors.id',)
            ->select('product_variants.*', 'colors.color_name')
            ->where('product_variants.product_id', $idProduct)
            ->get(); */

        // $availableSizes = ProductVariant::all();
        $productVariants = ProductVariant::with(['product', 'color', 'availableSizes.size'])
            ->where('product_id', $idProduct)
            ->get();



        //dd($productVariants);
        // dd($product);

        return view('productDetail', compact('productVariants', 'product'));
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
