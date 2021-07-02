<?php

namespace App\Imports;

use App\Questionlist;
use Maatwebsite\Excel\Concerns\ToModel;

class Importquestion implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Questionlist([
             'question_name' => $row['question_name'],
             'option1'     => $row['option1'],
             'option2'     => $row['option2'],
             'option3'     => $row['option3'],
             'option4'     => $row['option4'],
             'answer'     => $row['answer']
            
        ]);
    }
}
