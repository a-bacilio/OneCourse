<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $withCount = ['lessons'];

    public function course(){
        return $this->belongsTo("App\Models\Course");
    }

    public function lessons(){
        return $this->hasMany("App\Models\Lesson");
    }

    protected $guarded = ['id'];

}
