<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'article_id', 'comment'];
    public $timestamps = false;
}
/*
 public function article() {

    return $this->belongsTo('App\Article', 'id');

  }*/