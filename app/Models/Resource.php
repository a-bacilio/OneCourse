<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{

    protected $fillable = [
        'name',
        'type',
        'order',
        'lesson_id',
    ];

    use HasFactory;

    public function lesson(){
        return $this->belongsTo('App\Models\Lesson');
    }

    public function image(){
        return $this->hasOne('App\Models\Image');
    }

    public function online_video(){
        return $this->hasOne('App\Models\OnlineVideo');
    }

}
