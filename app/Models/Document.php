<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'data',
        'fyp_es_id',
        'user_id',
    ];

    protected $casts = [
        'updated_at' => 'datetime',
    ];
    /**
     * @var int|mixed
     */
}
