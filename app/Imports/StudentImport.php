<?php

namespace App\Imports;

use App\Models\students;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new students([
            'name' => $row['name'],  // Adjust this based on Excel column headers //! should match 1 to 1
            'year' => $row['year'],
            'classname' => $row['classname'],
        ]);
    }
}
