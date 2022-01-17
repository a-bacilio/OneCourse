<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SusEvaluation extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo("App\Models\User");
    }

    protected $fillable = [
        'sus1',
        'sus2',
        'sus3',
        'sus4',
        'sus5',
        'sus6',
        'sus7',
        'sus8',
        'sus9',
        'sus10',
        'user_id',
    ];















}
