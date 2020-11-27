<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
        'state',
        'decision_date',
        'topic_id',
        'user_id',
        'supervisor_id',
    ];

    protected $casts = [
        'updated_at' => 'datetime',
    ];
    /**
     * @var int|mixed
     */
}
