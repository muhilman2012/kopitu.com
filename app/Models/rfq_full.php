<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rfq_full extends Model
{
    use HasFactory;
    protected $table = 'rfq_fulls';

    protected $primaryKey = 'id_rfq_fulls';

    protected $fillable = [
        'exp', 
        'min_price', 
        'max_price', 
        'type_price', 
        'location', 
        'file1', 
        'file2', 
        'file3', 
        'file4', 
        'method_payment',
        'rfq_id',
    ];

    public $timestamps = false;
}
