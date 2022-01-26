<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'resource_id'
    ];

    public function resource(){
        return $this->belongsTo('App\Models\Resources');
    }

}
