<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class className extends Model
{
    use HasFactory;
    protected $table = 'classNames';
    protected $primaryKey = 'classID';

    protected $fillable = ['classname', 'year'];

    public function students()
    {
        return $this->hasMany(students::class, 'classID');
    }

    public function teachers()
    {
        return $this->belongsToMany(teachers::class, 'class_teacher', 'classID', 'teacherID');
    }
}
