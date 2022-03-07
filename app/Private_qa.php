<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Private_qa extends Model
{

    protected $table = 'private_qas';
    public $timestamps = true;

    public function student()
    {
        return $this->belongsTo('App\Student_details', 'std_id');
    }
}
