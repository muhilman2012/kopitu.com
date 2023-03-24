<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productImages extends Model
{
    use HasFactory;

    protected $table = 'product_images';

    protected $primaryKey = 'id_product_images';

    protected $fillable = [
        'images_name', 'size', 'locations', 'id_product'
    ];
}
