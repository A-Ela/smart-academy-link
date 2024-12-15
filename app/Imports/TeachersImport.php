<?php

namespace App\Imports;

use App\Models\teachers;
use Maatwebsite\Excel\Concerns\ToModel;

class TeachersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new teachers([
           'teacherName' => $row['teacher_name'],  // Adjust this based on Excel column headers //! should match 1 to 1
            'email' => $row['email'],
            'password' => $row['password'],
        ]);
    }
}
