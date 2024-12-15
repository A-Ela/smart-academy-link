<?php

namespace App\Imports;

use App\Models\className;
use Maatwebsite\Excel\Concerns\ToModel;

class ClassnameImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new className([
            'classname' => $row['classname'],    // Assuming column in Excel is 'classname'
            'year' => $row['year'],
        ]);
    }
}
