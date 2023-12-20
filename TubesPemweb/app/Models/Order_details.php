<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order_details extends Model
{

    use HasFactory;
    protected $table = 'order_details';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    protected $fillable = [

        'product_id',
        'order_id',
        'quantity',
        'total_amount',

    ];


    public function orderDetailProducts()
    {
        return $this->hasMany(Product::class,  'id', 'product_id');
    }

    public function orderDetailOrders()
    {
        return $this->belongsTo(Order::class,  'id', 'order_id');
    }
}
