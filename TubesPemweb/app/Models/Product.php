<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; 
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    protected $fillable = [
        'category_id',
        'product_name',
        'description',
        'size',
    ];

    public function productCategories()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }

    public function productOrderDetails()
    {
        return $this->belongsToMany(Order_details::class, 'order_details', 'product_id', 'id');
    }
    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id', 'id');
    }
}