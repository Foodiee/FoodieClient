<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Post extends Model{
	protected $table = 'posts';

	public static function CreatePost($board_id, $description, $photo_link, $user_id, $place_id, $hashtag){
		$post = new Post();
		$post->description = $description;
		$post->photo_link = $photo_link;
		$post->user_id = $user_id;
		$post->board_id = $board_id;
		$post->place_id = $place_id;
		$post->hashtag = $hashtag;
		$post->save();
	}
}
