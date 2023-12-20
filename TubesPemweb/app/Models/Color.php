<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    
    protected $table = 'colors';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    protected $fillable = [
        'color_name',
    ];

    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class, 'color_id', 'id');
    }
}