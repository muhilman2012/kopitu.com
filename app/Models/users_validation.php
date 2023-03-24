<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_validation extends Model
{
    use HasFactory;

    protected $table = 'users_validations';

    protected $primaryKey = 'id_validations';

    protected $fillable = [
        'email',
        'key',
        'active',
        'id_users',
    ];
}
