<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'color_logo',
        'black_logo',
        'white_logo',
        'welcome_title',
        'welcome_text_1',
        'welcome_text_2',
        'welcome_video',
        'consent_img_1',
        'consent_img_2',
        'consent_img_3',
        'end_title',
        'end_text_1',
        'end_text_2',
        'certificate_img',
        'certificate_fontsize',
        'certificate_pos_x',
        'certificate_pos_y',
    ];

    use HasFactory;
}
