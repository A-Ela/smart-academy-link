<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentFeedback extends Model
{
    use HasFactory;

    protected $fillable = ['studentID', 'feedback'];

    public function student()
    {
        return $this->belongsTo(students::class);
    }
}
