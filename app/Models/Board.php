<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;
class Board extends Model
{
    //
	protected $table = 'boards';
	protected $primaryKey = 'board_id';
	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}
	public function posts()
	{
		return $this->hasMany('App\Models\Post');
	}
	public static function getBoardsByUserId($user_id)
	{
		$boards = User::find($user_id)->boards;
		return $boards;
	}
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
    public static function countBoardsByUserId($user_id){
        $boards = Board::where('user_id',$user_id)->count();
        return $boards;
    }

}
