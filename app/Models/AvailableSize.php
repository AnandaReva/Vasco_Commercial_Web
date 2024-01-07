<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableSize extends Model
{
    use HasFactory;

    protected $table = 'available_sizes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    protected $fillable = [
        'product_variant_id',
        'size_id',
        'price',
        'stock',
    ];

    // AvailableSize.php

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }
}
