<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $table = 'product_variants';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    protected $fillable = [
        'product_id',
        'color_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    //setiap varian produk (ProductVariant) memiliki satu ukuran (Size) dan satu warna 
    /*  public function size()
    {
        return $this->belongsTo(Size::class);
    } */

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function availableSizes()
    {
        return $this->hasMany(AvailableSize::class, 'product_variant_id');
    }


}