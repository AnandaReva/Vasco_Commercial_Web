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
    private $provider;
    private $productImageUrl;
    private $deliveryCost;
    private $recipient;
    private $Address;
    private $etdDate;




    /**
     * Create a new message instance.
     */
    public function __construct($product_name, $colorName, $sizeName, $qty, $total_price, $productImageUrl, $deliveryCost ,$recipient , $Address , $etdDate,$provider )
    {
        $this->product_name = $product_name;
        $this->colorName = $colorName;
        $this->sizeName = $sizeName;
        $this->qty = $qty;
        $this->total_price = $total_price;
        $this->provider = $provider;
        $this->productImageUrl = $productImageUrl;
        $this->deliveryCost = $deliveryCost;
        $this->recipient = $recipient;
        $this->Address = $Address;
        $this->etdDate = $etdDate;
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
                'provider' => $this-> provider,
                'productImageUrl' => $this->productImageUrl,
                'deliveryCost' => $this->deliveryCost,
                'recipient' => $this->recipient,
                'Address' => $this->Address,
                'etdDate' => $this->etdDate,
            ]);
    }
}
