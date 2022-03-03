<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_details extends Model
{

    protected $table = 'student_detailss';
    public $timestamps = true;

    public function department()
    {
        return $this->belongsTo('Department', 'dept_id');
    }

}
