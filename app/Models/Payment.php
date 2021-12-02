<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'amount', 'is_payed', 'transactionId' , 'referenceId', 'stars'
    ];

    public function user()
    {
        return $this->belongsTo(User::Class);
    }
}
