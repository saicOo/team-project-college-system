<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_desire extends Model
{

    protected $table = 'student_desires';
    public $timestamps = true;

    public function department1()
    {
        return $this->belongsTo('App\Department', 'desire_1_id');
    }
    
    public function department2()
    {
        return $this->belongsTo('App\Department', 'desire_2_id');
    }

    public function department3()
    {
        return $this->belongsTo('App\Department', 'desire_3_id');
    }

    public function studentName()
    {
        return $this->belongsTo('App\Student_details', 'id');
    }

}
