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


        // Inisialisasi array untuk hasil transformasi
        $transformedData = [];

        // Iterasi melalui setiap product variant
        foreach ($productVariants as $productVariant) {
            $transformedData[] = [
                'product_variants' => [
                    'available_size' => $productVariant->availableSizes->pluck('size'),
                ],
            ];
        }



        // Hasil transformasi
        //dd($transformedData);

        //dd($productVariants);
        // dd($product);

        return view('productDetail', compact('productVariants', 'product'));
    }

    public function order(Request $request, $idProduct)
    {
        $request->validate([
            'selected_color' => 'required',
            'size_name' => 'required',
            'qty' => 'required|numeric|min:1',
        ]);

        // Get the selected values from the form
        $selectedColor = $request->input('selected_color');
        $selectedSize = $request->input('size_name');
        $qty = $request->input('qty');
        $price = $request->input('price');
        $stock = $request->input('stock');
        $totalPrice = $price * $qty;

        dd($selectedColor, $selectedSize, $qty, $price, $totalPrice, $stock);


        //  return view('order', compact('productVariants', 'product'));
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