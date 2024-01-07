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
        return $this->belongsToMany(User::class, 'user_id', 'id');
    }

    public function productVariantTransactions()
    {
        return $this->belongsToMany(ProductVariant::class, 'product_variant_id', 'id');
    }

    public function availableSizeTransactions()
    {
        return $this->belongsToMany(AvailableSize::class, 'availableSize_id', 'id');
    }
}
