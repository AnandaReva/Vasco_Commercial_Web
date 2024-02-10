<?php

namespace App\Http\Controllers;

use App\Mail\receiptEmail;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductVariant;

use App\Models\Color;
use App\Models\ProductFile;
use App\Models\Transaction;
use App\Models\AvailableSize;
use App\Models\Delivery;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Response;


use RajaOngkir;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;


class OrderController extends Controller
{
    public function order(Request $request, $idProduct)
    {
        $request->validate([
            'selected_color' => 'required',
            'size_name' => 'required',
            'qty' => 'required|numeric|min:1',
        ]);

        //nama produk
        $productName = Product::where('id', $idProduct)->value('product_name');
        /*         $url = ProductFile::where('product_variant_id', $idProduct)->value('product_name'); */

        // Dapatin pilihan warna
        $selectedColor = $request->input('selected_color');
        $selectedColorName = Color::where('id', $selectedColor)->value('color_name');

        //  Pisahkan string size_name menjadi array menggunakan koma sebagai pembatas
        $sizeValues = explode(',', $request->input('size_name'));

        // Pisahkan array menjadi 3 bagian

        $selectedSize = $sizeValues[0];
        $price = $sizeValues[1];
        $stock = $sizeValues[2];
        $variant_id = $sizeValues[3];
        $availableSizeId = $sizeValues[4];

        //file
        $url = ProductFile::where('product_variant_id', $variant_id)->value('url');


        $qty = $request->input('qty');

        $totalPrice = $price * $qty;

        /*    dd($selectedColor, $selectedSize, $qty, $price, $totalPrice, $stock); */

        $provinces = RajaOngkir::province()->get();
        // $cities = RajaOngkir::city()->get();





        $productWeight = AvailableSize::where('id', $availableSizeId)->value('weight');
        $productsWeight = $productWeight * $qty;

        //  dd($productsWeight);


        /* 
        $courier1 = RajaOngkir::find(['origin' => 1, 'destination' => 2, 'weight' => 1000, 'courier' => 'jne'])
            ->courier()->get();
        $courier2 = RajaOngkir::find(['origin' => 1, 'destination' => 2, 'weight' => 1000, 'courier' => 'tiki'])
            ->courier()->get();
        $courier3 = RajaOngkir::find(['origin' => 1, 'destination' => 2, 'weight' => 1000, 'courier' => 'pos'])
            ->courier()->get();

        dump($provinces, $courier1, $courier2, $courier3); */



        return view('orderView', compact('productsWeight', 'idProduct', 'variant_id', 'availableSizeId', 'url', 'productName', 'selectedColor', 'selectedColorName', 'selectedSize', 'price', 'stock', 'qty', 'totalPrice', 'provinces'));
    }


    public function getCities(Request $request, $idProvince)
    {
        $provinceId = $idProvince;
        //  $request->input('province_id');

        try {
            $citiesProvince = RajaOngkir::find(['province_id' => $idProvince])->city()->get();

            // Convert the collection to an array
            $citiesArray = $citiesProvince->toArray();

            return Response::json(['cities' => $citiesArray]);
        } catch (\Exception $e) {
            return Response::json(['error' => $e->getMessage()], 500);
        }
    }



    public function getCouriers(Request $request, $idCity, $idCourier, $productsWeight)
    {
        $cityId = $idCity;
        $origin = 153; // jaksel
        // weight reference: https://rocketmf.com/en/weight#tab-1
        try {
            $couriers = RajaOngkir::find(['origin' => $origin, 'destination' => $cityId, 'weight' => $productsWeight, 'courier' => $idCourier])
                ->courier()
                ->get();

            // Check if $couriers is an array
            if (is_array($couriers)) {
                return response()->json(['couriers' => $couriers]);
            } else {
                // If $couriers is not an array, handle it accordingly
                return response()->json(['error' => 'Invalid response format'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }





    public function process(Request $request, $idProduct, $idVariant, $idAvailableSize)
    {

        // dd($request->all());

        $provider = $request->input('courier_provider');

        $serviceDescription = $request->input('service_description');
        $serviceDescriptionArray = explode(',', $serviceDescription);
        $service = $serviceDescriptionArray[0];
        $costValue = $serviceDescriptionArray[1];
        $etd = $serviceDescriptionArray[2];

        //  dd($provider, $service, $costValue, $etd, $request->all());



        $item_price = $request->input('total_price');
        $total_price = $item_price +  $costValue;




        $delivery = Delivery::create([
            'cost' => $costValue,
            'city' => $request->input('city'),
            'delivery_address' => $request->input('address'),
            'provider' => $request->input('courier_provider'),
            'service' =>  $service,
            'etd' =>  $etd,
            'recipient' => $request->input('recipient'),
            'weight' => $request->input('weight'),
        ]);

        // dd($idProduct, $idVariant, $idAvailableSize);
        $transaction = Transaction::create([
            'product_id' => $idProduct,
            'product_variant_id' => $idVariant,
            'available_size_id' => $idAvailableSize,
            'qty' => $request->input('qty'),
            'total_price' => $total_price,
            'status' => 'pending',
            'user_id' => $request->input('user_id'),

        ]);



        $stock = $request->input('stock');




        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;





        /*     $updateStock = [
            '  idAvailableSize' =>  $idAvailableSize,
        ]; */


        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => intval($total_price), // no decimal allowed for creditcard
            )
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);




        $transaction->snap_token = $snapToken;
        $transaction->save();




        return redirect()->route('order.confirm', ['idTransaction' => $transaction->id, 'idDelivery' => $delivery->id]);
    }





    public function confirm($idTransaction, $idDelivery)
    {
        // Fetch the transaction details from the database based on the provided ID
        $transaction = Transaction::findOrFail($idTransaction);
        $delivery = Delivery::findOrFail($idDelivery);

        // Pass the transaction details to the view
        return view('confirmView', compact('transaction', 'delivery'));
    }


    public function updateData($idTransaction, $idDelivery)
    {
        // Fetch the transaction details from the database based on the provided ID
        $transaction = Transaction::findOrFail($idTransaction);
        $delivery = Delivery::findOrFail($idDelivery);

        Transaction::where('id', $transaction->id)->update([
            'status' => 'success',
        ]);


        $transactionUpdate = Transaction::findOrFail($idTransaction);



        /*  $stockAwal = AvailableSize::findOrFail($transaction->available_size_id); */

        // Disable timestamps for this update
        AvailableSize::where('id', $transaction->available_size_id)->update([
            'stock' => DB::raw('stock - ' . $transaction->qty),
        ]);




        $product_name = Product::where('id', $transactionUpdate->product_id)->value('product_name');
        //  dd($product_name);

        $colorName = ProductVariant::find($transactionUpdate->product_variant_id)->color->color_name;
        $sizeName = AvailableSize::find($transactionUpdate->available_size_id)->size->size_name;
        $productFile = ProductFile::where('product_variant_id', $transactionUpdate->product_variant_id)->first();
        $productImageUrl = $productFile ? $productFile->url : null;

        //  dd($productImageUrl);

        $qty = $transactionUpdate->qty;

        $deliveryCost = $delivery->cost;
        $Address = $delivery->delivery_address;
        $recipient = $delivery->recipient;
        $provider = $delivery->provider;


        $etdRange = explode('-',  $delivery->etd);
        // Ambil tanggal sekarang
        $now = Carbon::now();
        // Ambil tanggal estimasi berdasarkan rentang
        $startDate = $now->addDays($etdRange[0]);
        $endDate = $now->addDays($etdRange[1]);

        // Format output 
        $formattedStartDate = $startDate->format('d');
        $formattedEndDate = $endDate->format('d-m-Y');

        $etdDate = $formattedStartDate . ' to ' . $formattedEndDate;


        $total_price =  $transactionUpdate->total_price;

        $userEmail = Session::get('email');



        




        try {

            Mail::to($userEmail)->send(new receiptEmail($product_name, $colorName, $sizeName, $qty, $total_price, $productImageUrl, $deliveryCost, $recipient, $Address, $etdDate, $provider));
        } catch (\Throwable $th) {
            dd("error: " . $th->getMessage());
            return redirect()->route('landing')->with('error', 'Sorry, Something went wrong.');
        }










        // Pass the transaction details to the view
        /* dd($stockAwal); */

        return redirect()->route('landing')->with('success', ' Thank You For Shopping With Us');
    }
}
