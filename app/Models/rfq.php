<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rfq extends Model
{
    use HasFactory;
    protected $table = 'rfq';

    protected $primaryKey = 'id_rfq';

    protected $fillable = [
        'product_name', 
        'categories', 
        'qty', 
        'units', 
        'description',
        'users_id',
    ];

}
