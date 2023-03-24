<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_purchase extends Model
{
    use HasFactory;
    protected $table = 'product_purchases';

    protected $primaryKey = 'id_product_purchases';

    protected $fillable = [
        'product_name',
        'slug',
        'category',
        'weight',
        'price',
        'qty',
        'total_price',
        'date',
        'images',
        'description',
        'transaction_id',
        'product_id',
    ];

    public $timestamps = false;

}
