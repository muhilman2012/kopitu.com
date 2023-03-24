<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $primaryKey = 'id_news';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'description',
        'images',
    ];
}
