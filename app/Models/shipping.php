<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
    use HasFactory;

    protected $table = 'shippings';

    protected $primaryKey = 'id_shippings';

    protected $fillable = [
        'username', 
        'phone', 
        'province', 
        'city', 
        'address', 
        'postal_code', 
        'expedition', 
        'service', 
        'price', 
        'estimation', 
        'receipt', 
        'transaction_id',
    ];
}
