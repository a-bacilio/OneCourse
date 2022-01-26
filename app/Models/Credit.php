<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $fillable = [
        'name',
        'role',
        'description',
        'picture',
        'order',
    ];
    use HasFactory;
}
