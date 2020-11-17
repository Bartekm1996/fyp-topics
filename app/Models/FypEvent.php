<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FypEvent extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'startdate',
        'enddate',
        'grade',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'startdate' => 'datetime',
        'enddate' => 'datetime',
    ];
}
