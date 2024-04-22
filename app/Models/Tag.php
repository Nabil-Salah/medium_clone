<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $connection = 'MONGODB';
    protected $collection = 'tags';
    protected $casts = ['name' => 'string'];
    protected $fillable = [
        'name'
    ];
}
