<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'bm',
        'bi',
        'sains',
        'matematik',
        'rbt',
        'pjk',
        'psv',
        'sejarah',
        'feedback',
    ];
}
