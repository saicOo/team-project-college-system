<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_desire extends Model
{

    protected $table = 'student_desires';
    public $timestamps = true;

    public function departments()
    {
        return $this->belongsTo('App\Department', 'desire_1id');
    }

}
