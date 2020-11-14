<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course',
        'image',
        'qca',
    ];

    protected $casts = [
        'updated_at' => 'datetime',
    ];
}
