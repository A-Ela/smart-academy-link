<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarbiah extends Model
{
    use HasFactory;

    protected $fillable = [
        'studentID',
        'cukup_solat',
        'amali_solat',
        'tilawah_al_quran',
        'mathurat',
        'feedback',
    ];
}