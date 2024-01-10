<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;


use Illuminate\Http\Request;
use App\Models\Order_details;
use App\Models\ProductVariant;



class CustomerController extends Controller
{
    public function landing(Request $request)
    {

        $categories = Category::with('categoryProducts')->get();

        $userInfo = $request->query('userInfo');

        // Ambil nilai userInfo dari query string
        if ($userInfo == null) {

            return view('landingView', compact('categories'));
        } else {

            // Decode nilai userInfo jika perlu
            $decodedUserInfo = json_decode($userInfo, true);

            $uid = $decodedUserInfo['uid'];
            $displayName = $decodedUserInfo['displayName'];
            $email = $decodedUserInfo['email'];


            // cek apakah user sudah terdaftar di database
            $userCek = User::where('email', $email)->first();
            if ($userCek == null) {
                $user = new User;
                $user->name = $displayName;
                $user->email = $email;
                $user->password = bcrypt('akascabulsangat');
                $user->save();
            }


            $idLogin = User::where('email', $email)->value('id');
            /*   dd($idLogin); */

            // Simpan data user ke session



            Session::put('idLogin', $idLogin);
            Session::put('username', $displayName);
            Session::put('email', $email);








            return view('landingView', compact('categories'));
        }
    }

    public function showCatalog(Request $request)
    {

        // Buat serach by category !!JANGAN SENTUH
        $idCategory = $request->input('categoriesOption');
        $searchCategorySubmit = $request->input('searchCategorySubmit');
        if ($searchCategorySubmit == "searchCategory" && $idCategory != null) {

            //  dd($request->all(), $idCategory); 
            return redirect()->route('category.show', ['idCategory' => $idCategory]);
        }

        /*  */


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
            ->paginate(9);


        return view('catalogView', compact('categoryList', 'productsList', 'keyword'));
    }




    public function showProductsPerCategory(Request $request, $idCategory)
    {
        /* dd($request->all(), $idCategory); */
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
        $productColors = [
            "black"   => "#000000",
            "white"   => "#ffffff",
            "grey"    => "#fdfdfd",
            "red"     => "#990000",
            "blue"    => "#1520A6",
            "purple"  => "#570861",
        ];

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
