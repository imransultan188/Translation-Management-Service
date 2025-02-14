<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'content', 'locale', 'tags'];

    protected $casts = [
        'tags' => 'array', // JSON casting
    ];
}
