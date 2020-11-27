<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'qca',
        'user_id',
        'max_requests',
    ];

    protected $casts = [
        'updated_at' => 'datetime',
    ];
    /**
     * @var int|mixed
     */
}
