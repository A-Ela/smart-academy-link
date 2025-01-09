<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class teachers extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'teacherID';

    // Specify the fillable attributes for mass assignment
    protected $fillable = ['teacherName', 'email', 'password'];

    // Define the many-to-many relationship with the Class model
    public function classes()
    {
        return $this->belongsToMany(className::class, 'class_teacher', 'teacherID', 'classID');
    }

    // Define the relationship with the Subject model
   // public function subjects()
    //{
      //  return $this->hasMany(Subjects::class, 'teacherID');
    //}

    // Optionally, hide the password attribute from array or JSON serialization
    protected $hidden = ['password'];
}
