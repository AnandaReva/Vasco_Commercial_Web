<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Color;
use App\Models\Category;
use App\Models\Size;
use App\Models\ProductFile;
use App\Models\AvailableSize;
use GuzzleHttp\Psr7\Message;

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
        /*     $colors = Color::all();
        $sizes = Size::all(); */

        return view('adminView/addProductAdmin', compact('categoryList'));
    }

    public function storeProductAdmin(Request $request)
    {
        //dd($request->all());


        $category = $request->input('categoriesOption');
        $productName = $request->input('productName');
        $description = $request->input('description');

        //  dd($categories, $productName, $description);


        $product = Product::create([
            'category_id' => $category,
            'product_name' => $productName,
            'description' => $description,
        ]);


        return  redirect()->route('variantAdmin.insert', ['idProduct' => $product->id])->with('success', 'Product Has been Added');
    }

    public function destroyProductAdmin($idProduct)
    {
        // dd($idProduct);
        $product = Product::find($idProduct);
        $product->delete();

        return redirect()->route('catalogAdmin.show')->with('success', 'Product Has been Deleted');
    }

    public function editProductAdmin($idProduct)
    {
        $product = Product::find($idProduct);
        $categoryList = Category::get(['id', 'category_name']);

        return view('adminView/editProductAdmin', compact('product', 'categoryList'));
    }

    public function updateProductAdmin(Request $request, $idProduct)
    {
        //dd($request->all(), $idProduct);

        $category = $request->input('categoriesOption');
        $productName = $request->input('productName');
        $description = $request->input('description');

        // Find the product by ID
        $product = Product::find($idProduct);

        // Check if the product exists
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }


        $product->update([
            'category_id' => $category,
            'product_name' => $productName,
            'description' => $description,

        ]);

        return redirect()->route('productAdmin.show', ['idProduct' => $idProduct])->with('success', 'Product have been updated successfully.');
    }

    public function insertVariantAdmin($idProduct)
    {
        // dd($idProduct);
        $categoryName = Category::whereHas('categoryProducts', function ($query) use ($idProduct) {
            $query->where('id', $idProduct);
        })->value('category_name');

        //  dd($categoryName);
        $product = Product::where('id', $idProduct)->first();

        $colors = Color::all();

        return view('adminView/addVariantAdmin', compact('product', 'colors', 'categoryName'));
    }

    public function storeVariantAdmin(Request $request, $idProduct)
    {



        //  dd($idProduct, $request->input('colorOption'));

        $categoryName = $request->input('categoryName');
        $colors = $request->input('colorOption');
        $files = $request->file('file');


        //  dd($request->all());


        $variantIds = []; // kumpulin id variant jadi 1

        $colors = $request->input('colorOption');

        foreach ($colors as $index => $color) {
            $productVariant = ProductVariant::create([
                'product_id' => $idProduct,
                'color_id' => $color,
            ]);


            $variantIds[] = $productVariant->id; // kumpulin id variant jadi 1

            // Storing the file in the 'public/product_resources' directory
            $file = $files[$index];
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('product_resources/' . $categoryName), $fileName);


            // Creating a new ProductFile entry with the file URL and variant ID
            ProductFile::create([
                'product_variant_id' => $productVariant->id,
                'file_name' => $fileName,
                'url' => 'product_resources/' . $categoryName . '/' . $fileName,
                'color_id' => $color,
            ]);
        }

        //dd($variantIds, $files);

        $idVariants = implode(',', $variantIds);
        //dd($idVariants);

        // Mengirimkan array ID variant ke rute atau tempat yang diperlukan
        return redirect()->route('availableSizeAdmin.insert', ['idProduct' => $idProduct, 'idVariants' => $idVariants])->with('success', 'Variants have been added to the product');
    }

    public function destroyVariantAdmin($idProduct, $idVariant)
    {
        // dd($idProduct, $idVariant);

        $productVariant = ProductVariant::find($idVariant);
        $productVariant->delete();


        return redirect()->route('productAdmin.show', ['idProduct' => $idProduct])->with('success', 'Variants have been deleted from the product');
    }




    public function editVariantAdmin($idProduct, $idVariant)
    {
        $productVariant = ProductVariant::find($idVariant);
        $product = $productVariant->product;
        $categoryName = $product->category->category_name;
        $colors = Color::all();

        return view('adminView/editVariantAdmin', compact('product', 'productVariant', 'colors', 'categoryName'));
    }

    public function updateVariantAdmin(Request $request, $idProduct, $idVariant)
    {
        // dd($request->all());

        // Ambil data dari formulir
        $colors = $request->input('colorOption');
        $files = $request->file('file');
        $categoryName = $request->input('categoryName');

        // Update data variant
        $productVariant = ProductVariant::find($idVariant);

        foreach ($colors as $index => $color) {
            // Update color_id pada variant
            $productVariant->color_id = $color;
            $productVariant->save();

            // Periksa apakah ada file gambar yang diunggah
            if ($files[$index]) {
                // Hapus file gambar lama jika ada
                if ($productVariant->file) {
                    $productVariant->file->delete();
                }

                // Simpan file gambar baru
                $file = $files[$index];
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('product_resources/' . $categoryName), $fileName);

                // Simpan informasi file di database
                ProductFile::create([
                    'product_variant_id' => $productVariant->id,
                    'file_name' => $fileName,
                    'url' => 'product_resources/' . $categoryName . '/' . $fileName,
                    'color_id' => $color,
                ]);
            }
        }

        return redirect()->route('productAdmin.show', ['idProduct' => $idProduct])->with('success', 'Variant has been updated successfully');
    }








    public function insertAvailableSizeAdmin($idProduct, $idVariants)

    {

        $idVariants = explode(',', $idVariants);



        /*   $product_variants = ProductVariant::whereIn('id', $idVariants)->get();
        dd($product_variants); */

        $sizes = Size::all();

        return view('adminView/addAvailableSizeAdmin', compact('idProduct', 'idVariants', 'sizes'));
    }


    public function storeAvailableSizeAdmin(Request $request, $idProduct, $idVariants)

    {


        $requestData = $request->all();

        // Extracting data from the request
        $prices = $requestData['price'];
        $stocks = $requestData['stock'];
        $weights = $requestData['weight']; // Corrected variable name
        $sizeOptions = $requestData['sizeOption'];

        // Loop through each variant ID
        foreach ($prices as $variantId => $variantPrices) {
            foreach ($variantPrices as $sizeIndex => $price) {
                // Retrieve corresponding stock and sizeOption values
                $stock = $stocks[$variantId][$sizeIndex];
                $weight = $weights[$variantId][$sizeIndex]; // Corrected variable name
                $sizeOption = $sizeOptions[$variantId][$sizeIndex]; // Corrected variable name

                // Cast values to integer
                $price = (int)$price;
                $stock = (int)$stock;
                $weight = (int)$weight;
                $sizeOption = (int)$sizeOption;

                // dd($stock, $sizeOption, $price);

                AvailableSize::create([
                    'product_variant_id' => $variantId,
                    'size_id' => $sizeOption,
                    'price' => $price,
                    'stock' => $stock,
                    'weight' => $weight,
                ]);
            }
        }

        // dd($sizeOptions, $stocks, $prices);


        return redirect()->route('productAdmin.show', ['idProduct' => $idProduct])->with('success', 'Available Sizes have been added to the product variants');
    }

    public function destroyAvailableSizeAdmin($idProduct, $idVariant, $idAvailableSize)
    {
        // dd($idAvailableSize);

        $availableSize = AvailableSize::find($idAvailableSize);
        $availableSize->delete();

        return redirect()->route('productAdmin.show', ['idProduct' => $idProduct])->with('success', 'Available Size have been deleted from the product variant');
    }

    public function editAvailableSizeAdmin($idProduct, $idVariant, $idAvailableSize)
    {

        /*   $product_variants = ProductVariant::whereIn('id', $idVariants)->get();
        dd($product_variants); */
        $productVariant = ProductVariant::find($idVariant);
        $availableSize = AvailableSize::find($idAvailableSize);


        $sizes = Size::all();

        return view('adminView/editAvailableSizeAdmin', compact('productVariant', 'availableSize', 'sizes', 'idProduct', 'idVariant', 'idAvailableSize'));
    }

    public function updateAvailableSizeAdmin(Request $request, $idProduct, $idVariant, $idAvailableSize)
    {

        //dd($request->all());
        $availableSize = AvailableSize::find($idAvailableSize);

        if (!$availableSize) {
            return redirect()->route('productAdmin.show', ['idProduct' => $idProduct])->with('error', 'Available Size not found.');
        }
    
        $availableSize->size_id = $request->input('sizeOption');
        $availableSize->price = $request->input('price');
        $availableSize->stock = $request->input('stock');
        $availableSize->weight = $request->input('weight');
        $availableSize->save();
    

        return redirect()->route('productAdmin.show', ['idProduct' => $idProduct])->with('success', 'Available Sizes have been Update Successfully');
    }
}
