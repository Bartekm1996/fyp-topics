<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Progess
 * @package App\Models
 * This holds the state the current user is at
 */
class Progress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fypevent_state_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'lastupdated' => 'datetime',
    ];
}
