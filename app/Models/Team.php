<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'Team_name',
        'description',
        'Admin_id',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
