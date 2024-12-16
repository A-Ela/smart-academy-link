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

     //* use smth similar to this to be able to fill fields not marked as fillable
    /** 
    * public function collection(Collection $rows)
    *{
     *   foreach ($rows as $row) {
      *      DB::table('teachers')->insert([
        *        'teacherName' => $row[0],
          *      'teacherEmail' => $row[1],
            *    'teacherPhone' => $row[2],
            *    'otherField' => $row[3], // Even if not fillable
            *]);
        *}
    *} 
        **/
}
