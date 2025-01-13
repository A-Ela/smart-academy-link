<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hafazan extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'surah_name', 'ayah_number', 'recite_date'
    ];

    // Define the relationship with Student
    public function student()
    {
        return $this->belongsTo(students::class);
    }
}
