<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    use HasFactory;

    // Explicitly define the table name
    protected $table = 'homeworks';  // Ensure this matches the table name in the database

    // Define the fillable attributes
    protected $fillable = ['description', 'due_date', 'subject_name', 'classID'];
}

