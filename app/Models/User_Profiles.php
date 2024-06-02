<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Profiles extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'company_name',
        'website',
        'country',
        'city',
        'address',
        'zipcode',
        'job_title',
        'team_size',
        'industry',
        'industry-other',



    ];

}
