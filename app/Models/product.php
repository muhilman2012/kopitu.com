<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $primaryKey = 'id_product';

    protected $fillable = [
        'product_name',
        'slug',
        'stock',
        'sold',
        'weight',
        'price',
        'description',
        'date',
        'images',
    ];


    public $timestamps = false;
}
