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
