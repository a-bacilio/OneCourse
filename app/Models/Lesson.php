<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    public function section(){
        return $this->belongsTo('App\Models\Section');
    }

    public function users(){
        return $this->belongsToMany('App\Models\Section');
    }

    public function resources(){
        return $this->hasMany('App\Models\Resources');
    }


}
