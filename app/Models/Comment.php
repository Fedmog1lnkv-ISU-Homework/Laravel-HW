<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
	protected $table = 'comments';
	protected $primaryKey = 'id';
	protected $fillable = [
        'user_id', 'note_id','text'
    ];

	static public function get_comments_for_note($note_id) {
		$query = Comment::join('users', 'comments.user_id', '=', 'users.id')->select('comments.id', 'users.username', 'comments.text', 'comments.created_at')->where("comments.note_id", $note_id)->orderBy('comments.created_at');
		return $query->get();
	}

	static public function get_comments_number_for_note($note_id) {
		$count = Comment::where('note_id', $note_id)->count();
		return $count;
	}
}
