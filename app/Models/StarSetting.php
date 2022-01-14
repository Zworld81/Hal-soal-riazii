<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StarSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'default_stars',
        'per_question_star',
        'per_support_star',
        'per_answer_star',
        'star_price',
        'give_gift_star_on_register',
    ];
}
