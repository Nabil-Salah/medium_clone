<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $connection = 'MONGODB';
    protected $casts = ['name' => 'string'];
    protected $fillable = [
        'name'
    ];
}
