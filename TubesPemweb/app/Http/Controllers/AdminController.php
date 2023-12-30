<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Color;
use App\Models\Category;
use App\Models\Size;

class AdminController extends Controller
{
    public function showCatalogAdmin(Request $request)
    {   // Buat serach by category !!JANGAN SENTUH
        $idCategory = $request->input('categoriesOption');
        $searchCategorySubmit = $request->input('searchCategorySubmit');
        if ($searchCategorySubmit == "searchCategory" && $idCategory != null) {

            //  dd($request->all(), $idCategory); 
            return redirect()->route('category.show', ['idCategory' => $idCategory]);
        }

        $keyword = $request->search;

        $categoryList = Category::get(['id', 'category_name']);
            /*   dd($keyword, $categoryList) */;

        $productsList = Product::where(function ($q) use ($keyword) {
            $q->where('product_name', 'LIKE', "%$keyword%");
        })
            ->orWhereHas('variants.productFiles', function ($q) use ($keyword) {
                $q->where('file_name', 'LIKE', "%$keyword%");
            })
            ->with('variants.productFiles')
            ->paginate(20);


        return view('adminView/showCatalogAdmin', compact('categoryList', 'productsList', 'keyword'));
    }

    public function detailProductAdmin($idProduct)
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

        return view('adminView/adminProductDetail', compact('productVariants', 'product'));
    }

    public function insertProductAdmin()
    {
        $categoryList = Category::get(['id', 'category_name']);
        $colors = Color::all();
        $sizes = Size::all();
       /*  dd($categoryList); */
        return view('adminView/addProductAdmin', compact('categoryList', 'colors', 'sizes'));
    }

    public function storeProductAdmin(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'color_id' => 'required',
            'size_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'product_image' => 'required',
        ]);

        dd($request->all());
        




     /*    $product = Product::create([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]); */
        return view('adminView/adminProductInsert', compact('categoryList'));
    }
}
