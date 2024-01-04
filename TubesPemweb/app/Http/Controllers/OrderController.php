<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Color;
use App\Models\ProductFile;
use App\Models\Transaction;
use App\Models\AvailableSize;

use Illuminate\Support\Facades\DB;

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



        return view('orderView', compact('idProduct', 'variant_id', 'availableSizeId', 'url', 'productName', 'selectedColor', 'selectedColorName', 'selectedSize', 'price', 'stock', 'qty', 'totalPrice',));
    }


    public function process(Request $request, $idProduct, $idVariant, $idAvailableSize)
    {

        $transaction = Transaction::create([
            'product_id' => $idProduct,
            'product_variant_id' => $idVariant,
            'available_size_id' => $idAvailableSize,
            'qty' => $request->input('qty'),
            'total_price' => $request->input('total_price'),
            'status' => 'pending',
            'user_id' => $request->input('user_id'),

        ]);

        $stock = $request->input('stock');

        $total_price = $request->input('total_price');




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

        /* $params = [
            'transaction_details' => [
                'order_id' => rand(),
                'gross_amount' => intval($total_price), // no decimal allowed for credit card
            ],
            // Menambahkan informasi stok yang telah diupdate
            'item_details' => [
                [
                    'idAvailableSize' => $idAvailableSize,
                ],
            ],
        ];
 */
        $snapToken = \Midtrans\Snap::getSnapToken($params);




        $transaction->snap_token = $snapToken;
        $transaction->save();




        return redirect()->route('order.confirm', $transaction->id);
    }

    public function confirm($transactionId)
    {
        // Fetch the transaction details from the database based on the provided ID
        $transaction = Transaction::findOrFail($transactionId);

        // Pass the transaction details to the view
        return view('confirmView', compact('transaction'));
    }


    public function updateData($transactionId)
    {
        // Fetch the transaction details from the database based on the provided ID
        $transaction = Transaction::findOrFail($transactionId);

        Transaction::where('id', $transaction->id)->update([
            'status' => 'success',
        ]);
    
       /*  $stockAwal = AvailableSize::findOrFail($transaction->available_size_id); */
    
        // Disable timestamps for this update
        AvailableSize::where('id', $transaction->available_size_id)->update([
            'stock' => DB::raw('stock - ' . $transaction->qty),
        ]);
    
        // Pass the transaction details to the view
        /* dd($stockAwal); */
    
        return redirect()->route('landing')->with('success', ' Thank You For Shopping With Us');
    }
}
