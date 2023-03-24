<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_address extends Model
{
    use HasFactory;

    protected $table = 'users_address';

    protected $primaryKey = 'id_address';

    // protected file table produk
    protected $fillable = [
        'username', 
        'label', 
        'phone', 
        'address', 
        'districts', 
        'postal_code', 
        'province_id', 
        'city_id', 
        'active', 
        'users_id',
    ];
}
