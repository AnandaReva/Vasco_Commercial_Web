<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $table = 'deliveries';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    protected $fillable = [

        'cost',
        'city',
        'delivery_address',
        'provider',
        'service',
        'etd',
        'recipient',
        'address',
        'weight',

    ];


    public function deliveryTransaction()
    {
        return $this->hasOne(Transaction::class,  'id', 'delivery_id');
    }
}
