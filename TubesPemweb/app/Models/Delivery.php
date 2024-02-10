<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $table = 'deliveries';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    protected $fillable = [

        'order_id',
        'delivery_method',
        'delivery_address',

    ];

    public function deliveryOrders()
    {
        return $this->belongsTo(Order::class,  'id', 'order_id');
    }
}
