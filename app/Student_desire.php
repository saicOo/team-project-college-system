<?php

namespace Student_desire;

use Illuminate\Database\Eloquent\Model;

class Student_desire extends Model 
{

    protected $table = 'student_desires';
    public $timestamps = true;

    public function departments()
    {
        return $this->belongsTo('Department', 'desire_1id');
    }

}