<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $withCount = ['sections','lessons'];

    protected $guarded = ['id'];

    public function students(){
        return $this->belongsToMany("App\Models\User");
    }

    public function sections(){
        return $this->hasMany("App\Models\Section");
    }

    public function lessons(){
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }


}
