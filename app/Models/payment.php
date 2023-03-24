<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $primaryKey = 'id_payment';

    protected $fillable = [
        'payment_type',
        'status',
        'gross_amount',
        'bank',
        'va_number',
        'date',
        'time',
        'deathline',
        'invoice',
        'transaction_id',
    ];


    public $timestamps = false;
}
