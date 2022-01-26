<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $withCount = ['resources'];
    protected $fillable = [
        'name',
        'description',
        'order',
        'section_id',
    ];
    use HasFactory;

    public function section(){
        return $this->belongsTo('App\Models\Section');
    }


    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    public function resources(){
        return $this->hasMany('App\Models\Resource');
    }


}
