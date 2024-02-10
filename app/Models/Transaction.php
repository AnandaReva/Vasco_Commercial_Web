<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    protected $fillable = [
        'product_id',
        'user_id',
        'product_variant_id',
        'qty',
        'available_size_id',
        'total_price',
        'status',
        'snap_token',
    ];

    public function userTransactions()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function productTransaction()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function productVariantTransactions()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id', 'id');
    }

    public function availableSizeTransactions()
    {
        return $this->belongsTo(AvailableSize::class, 'available_size_id', 'id');
    }

    public function deliveryTransaction()
    {
        return $this->belongsTo(Delivery::class, 'delivery_id', 'id');
    }



}
