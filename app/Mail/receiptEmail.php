<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class receiptEmail extends Mailable
{
    use Queueable, SerializesModels;


    private $product_name;
    private $colorName;
    private $sizeName;
    private $qty;
    private $total_price;
    private $status;
    private $productImageUrl;




    /**
     * Create a new message instance.
     */
    public function __construct($product_name, $colorName, $sizeName, $qty, $total_price, $status, $productImageUrl)
    {
        $this->product_name = $product_name;
        $this->colorName = $colorName;
        $this->sizeName = $sizeName;
        $this->qty = $qty;
        $this->total_price = $total_price;
        $this->status = $status;
        $this->productImageUrl = $productImageUrl;
    }

    public function build()
    {
        return $this
            ->from('namadepannamabelakang1781945@gmail.com', 'VASCO')
            ->subject('Order Receipt') // Mengatur subjek email
            ->view('email.orderReceipt')->with([
                'product_name' => $this->product_name, //
                'colorName' => $this->colorName,
                'sizeName' => $this->sizeName,
                'qty' =>   $this->qty,
                'total_price' => $this->total_price,
                'status' => $this->status,
                'productImageUrl' => $this->productImageUrl,
            ]); 
    }
}
