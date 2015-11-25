<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentEvent extends Model
{
    //
    protected $primaryKey = "comment_event_id";
	protected $table = 'comment_event';
    public static function createCommentEvent($post_id,$user_id,$comment){
        $comment_event = new CommentEvent;
        $comment_event->post_id = $post_id;
        $comment_event->user_id = $user_id;
        $comment_event->comment = $comment;
        $comment_event->save();
    }
    public static function deleteCommentEvent($comment_event_id){
        $result = Comment::where('comment_event_id',$comment_event_id)->first();
        return $result;
    }

}
