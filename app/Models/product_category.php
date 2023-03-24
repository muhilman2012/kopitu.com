<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_category extends Model
{
    use HasFactory;

    protected $table = 'product_categories';

    protected $primaryKey = 'id_product_categories';

    protected $fillable = [
        'categories',
        'categories_sub',
        'categories_child',
        'categories_id',
        'categories_sub_id',
        'categories_child_id',
        'product_id',
    ];
}
