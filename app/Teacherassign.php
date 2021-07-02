<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacherassign extends Model
{
     protected $fillable = [
        'student_id' ,'question_id',
    ];
}
