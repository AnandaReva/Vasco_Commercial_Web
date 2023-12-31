<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $table = 'sizes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    protected $fillable = [
        'size_name',
    ];

    public function sizes()
    {
        return $this->hasMany(AvailableSize::class, 'size_id', 'id');
    }
}
