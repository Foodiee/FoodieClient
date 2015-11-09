<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikeEvent extends Model
{
    //
	protected $table = 'like_event';
	protected $primaryKey = "like_event_id";
	public static function GetMostPost(){
		$post_id = LikeEvent::select('post_id')->orderBy('total_like', 'desc')->get();

		$array = array();
		foreach ($post_id as $key => $value) {
			array_push($array, $value['post_id']);
		}

		return $array;
	}
}
