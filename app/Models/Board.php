<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    //
	protected $table = 'boards';
	protected $primaryKey = 'board_id';
	public static function createBoard($boardName,$boardDescription=null,$cover_link=null,$user_id)
	{
		$board = new Board();
		$board->title = $boardName;
		$board->description=$boardDescription;
		$board->cover_link=$cover_link;
		$board->user_id = $user_id;
		try {
			$board->save();
		}
		catch(Exception $e)
		{

		}
		return $board;
	}
	public static function getBoardByUserId($user_id)
	{
		if(!isset($user_id))
			return;
		$boards = Board::where('user_id',$user_id)->get();
		return $boards;
	}
}
