<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Product extends Model
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'products';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    protected $fillable = [

        'category_id',
        'pruduct_name',
        'stock',
        'color',
        'price',
        'description',
        'size',
    ];

    public function productCategories()
    {
        return $this->hasMany(Category::class,  'id', 'category_id');
    }

    public function productOrderDetails()
    {
        return $this->belongsToMany(Order_details::class,  'id', 'product_id');
    }
}
