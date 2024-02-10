<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    protected $fillable = [

        'customer_id',
        'due',
        'status',


    ];

    public function orderOrderDetails()
    {
        return $this->belongsTo(Order_details::class,  'id', 'order_id');
    }

    public function orderCustomers()
    {
        return $this->belongsTo(Customer::class,  'id', 'customer_id');
    }

    public function orderPayments()
    {
        return $this->hasOne(Payment::class,  'id', 'order_id');
    }

    public function orderDeliveries()
    {
        return $this->hasOne(Delivery::class,  'id', 'order_id');
    }
}
