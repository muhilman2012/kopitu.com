<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $primaryKey = 'id_transaction';

    protected $fillable = [
        'invoice',
        'type',
        'price', 
        'status',
        'token',
        'users_id',
        'date',
        'time',
    ];

    public $timestamps = false;
}
