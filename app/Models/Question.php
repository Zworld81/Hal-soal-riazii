<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'teacher_id',
        'class',
        'file',
        'response_file',
        'description',
        'need_support',
        'status',
    ];

    public function answer() {
        return $this->belongsTo(Answer::class, 'id', 'question_id');
    }

    public function answerFile() {
        return $this->hasOne(Answer::class);
    }
}
