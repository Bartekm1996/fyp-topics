<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'topic',
        'message',
        'to',
        'from',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
