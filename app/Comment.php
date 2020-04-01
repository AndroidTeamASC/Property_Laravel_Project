<?php

namespace App;
use CommentReply;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'post_id','user_id','comment'
    ];
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    public function replyComments()
    {
        return $this->hasMany('App\CommentReply');
    }
}
