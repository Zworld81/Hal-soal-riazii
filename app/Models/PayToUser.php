<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayToUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'user_id',
        'old_stars'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
