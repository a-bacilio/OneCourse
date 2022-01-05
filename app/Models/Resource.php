<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    public function lessons(){
        return $this->belongsToMany('App\Models\Lesson');
    }

    public function image(){
        return $this->hasOne('App\Models\Image');
    }

    public function online_video(){
        return $this->hasOne('App\Models\OnlineVideo');
    }

}
