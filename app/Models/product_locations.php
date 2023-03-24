<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_locations extends Model
{
    use HasFactory;

    protected $table = 'product_locations';

    protected $primaryKey = 'id_product_locations';

    protected $fillable = [
        'province',
        'city',
        'province_id',
        'city_id',
        'product_id',
    ];
}
