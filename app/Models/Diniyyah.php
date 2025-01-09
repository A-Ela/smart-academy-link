<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diniyyah extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'akhlak',
        'aqidah',
        'sirah',
        'fiqh',
        'bahasa_arab',
        'tulisan_jawi',
        'feedback',
    ];
}