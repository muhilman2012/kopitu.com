<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_sub extends Model
{
    use HasFactory;
    protected $table = 'categories_sub';

    protected $primaryKey = 'id_categories_sub';

    protected $fillable = [
        'categories_sub',
        'slug_sub',
        'region_sub',
        'id_categories',
    ];
}
