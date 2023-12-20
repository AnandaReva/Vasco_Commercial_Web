<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductFile extends Model
{
    use HasFactory;

    protected $table = 'product_files';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    protected $fillable = [
        'file_name',
        'url',
    ];

    public function product()
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
