<?php

namespace App\Imports;

use App\Models\parents;
use Maatwebsite\Excel\Concerns\ToModel;

class ParentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new parents([
            'name' => $row['name'],    //! must be 1 to 1 with excel column name
            'email' => $row['email'],           
            'password' => $row['password'],              
            //'students-id' => $row['students-id'],         //!must add way to include parent student relation via excel
        ]);
    }
}
