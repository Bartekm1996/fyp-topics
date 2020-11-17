<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FypEventState extends Model
{
    use HasFactory;
    protected $fillable = [
        'started_on',
        'finished_on',
        'finished_grade',
        'state',
        'fypevent_id',
        'user_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'started_on' => 'datetime',
        'finished_on' => 'datetime',
    ];
}
