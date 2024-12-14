<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class parents extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'parentID';

    protected $fillable = ['email', 'password', 'name'];

    public function students()
    {
        return $this->belongsToMany(students::class, 'parent_student', 'parentID', 'studentID');
    }

    protected $with = ['students'];

    protected $hidden = ['password'];
}