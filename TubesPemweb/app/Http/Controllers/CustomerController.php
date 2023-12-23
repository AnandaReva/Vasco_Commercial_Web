<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;


use Illuminate\Http\Request;
use App\Models\Order_details;
use App\Models\ProductVariant;



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

    public function showCatalog(Request $request)
    {

        /*         $productList = Product::with('variants.productFiles')->paginate(9); */

        $keyword = $request->search;

        $productsList = Product::where(function ($q) use ($keyword) {
            $q->where('product_name', 'LIKE', "%$keyword%");
        })
            ->orWhereHas('variants.productFiles', function ($q) use ($keyword) {
                $q->where('file_name', 'LIKE', "%$keyword%");
            })
            ->with('variants.productFiles')
            ->paginate(9);


        return view('catalogView', compact('productsList', 'keyword'));
    }




    public function showProductsPerCategory(Request $request, $idCategory)
    {
        $categoryName = Category::where('id', $idCategory)->value('category_name');

        // Dari input  
        $keyword = $request->search;

        $categoryProducts = Category::with(['categoryProducts.variants.productFiles'])
        ->find($idCategory)
        ->categoryProducts()
        ->where(function ($query) use ($keyword) {
            $query->where('product_name', 'LIKE', "%$keyword%");
        })
        ->paginate(9);



        /* dd($categoryProducts,$categoryName); */

        return view('categoryProducts', compact('categoryName', 'categoryProducts', 'keyword'));
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
        $productVariants = ProductVariant::with(['product', 'color', 'availableSizes.size', 'productFiles'])
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

        //  dd($productVariants);
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

    public function showNewArrival()
    {
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $latestProducts = Product::whereBetween('created_at', [$startDate, $endDate])
            ->with('variants.productFiles') // Sesuaikan dengan kebutuhan
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        /*  dd($latestProducts); */

        return view('newArrivalView', compact('latestProducts'));
    }
}
