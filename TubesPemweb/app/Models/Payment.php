<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    protected $fillable = [

        'order_id',
        'payment_method',
        'payment_total',
        'due',
    ];

    public function paymentOrders()
    {
        return $this->belongsTo(Order::class,  'id', 'order_id');
    }

}
