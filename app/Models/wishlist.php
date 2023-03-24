<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlist';

    protected $primaryKey = 'id_wishlist';

    // protected file table produk
    protected $fillable = [
        'product_id', 
        'users_id',
    ];
}
