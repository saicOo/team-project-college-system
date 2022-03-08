<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment_news extends Model
{
    protected $table = 'comment_news';
    public $timestamps = false;
 public function adminName()
    {
        return $this->belongsTo('App\Admin', 'admin_id');
    }
 public function studentName()
    {
        return $this->belongsTo('App\Student_details', 'std_id');
    }
 public function newsName()
    {
        return $this->belongsTo('App\News', 'news_id');
    }
}
