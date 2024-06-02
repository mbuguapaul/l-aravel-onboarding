<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manager extends Model
{
    use HasFactory;

    protected $fillable = [
        'Client_name',
        'Client_email',
        'Client_phone',
        'Created_by',
        'Client_address',


    ];
}
