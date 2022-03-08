<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    public $timestamps = false;
 public function adminName()
    {
        return $this->belongsTo('App\Admin', 'admin_id');
    }
}
