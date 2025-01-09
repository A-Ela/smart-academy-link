<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class students extends Model
{
    use HasFactory;

    protected $primaryKey = 'studentID';

    protected $fillable = ['name', 'year', 'classname', 'classID', 'ic_no']; // Add 'classID' here

    // Define the relationship to the ClassModel (class table)
    public function class()
    {
        return $this->belongsTo(className::class, 'classID');
    }

    // Define the many-to-many relationship with ParentModel (parents table)
    public function parents()
    {
        return $this->belongsToMany(parents::class, 'parent_student', 'studentID', 'parentID');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function feedback()
    {
        return $this->hasOne(StudentFeedback::class);
    }
}
