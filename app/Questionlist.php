<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionlist extends Model
{
    protected $fillable = [
        'question_name','option1','option2','option3','option4', 'answer'    
                
           
    ];
}
