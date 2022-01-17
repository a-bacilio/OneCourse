<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CsuqEvaluation extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo("App\Models\User");
    }

    protected $fillable = [
        'csuq1',
        'csuq2',
        'csuq3',
        'csuq4',
        'csuq5',
        'csuq6',
        'csuq7',
        'csuq8',
        'csuq9',
        'csuq10',
        'csuq11',
        'csuq12',
        'csuq13',
        'csuq14',
        'csuq15',
        'csuq16',
        'user_id',
    ];

}
