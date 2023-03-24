<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_child extends Model
{
    use HasFactory;
    protected $table = 'categories_child';

    protected $primaryKey = 'id_categories_child';

    protected $fillable = [
        'categories_child',
        'slug_child',
        'region_child',
        'id_categories_sub',
    ];
}
