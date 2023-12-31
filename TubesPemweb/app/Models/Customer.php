<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    protected $fillable = [

        'customer_name',
        'address',
        'email',
        'phone',

    ];

    public function customerOrders()
    {
        return $this->hasMany(Order::class,  'id', 'customer_id');
    }
}
