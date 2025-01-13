<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tilawah extends Model
{
    protected $primaryKey = 'surahID';

    protected $fillable = [
        'surahName', 'ayatStart', 'ayatEnd', 'dateStart', 'dateEnd', 
        'grade', 'HafizRemark', 'studentID', 'classID'
    ];

    public function student()
    {
        return $this->belongsTo(students::class, 'studentID');
    }

    public function class()
    {
        return $this->belongsTo(className::class, 'classID');
    }
}
