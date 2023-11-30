<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
	protected $table = 'notes';
	protected $primaryKey = 'id';
	protected $fillable = [
        'user_id', 'title','content'
    ];


	static public function get_note($id) {
		$query = Note::join('users', 'notes.user_id', '=', 'users.id')->select('notes.*', 'users.username')->where("notes.id", $id);
		return $query->first();
	}

	static public function get_all_notes() {
		$query = Note::join('users', 'notes.user_id', '=', 'users.id')->select('notes.*', 'users.username');
		return $query->get();
	}

	static public function get_all_user_notes($user_id) {
		$query = Note::join('users', 'notes.user_id', '=', 'users.id')->select('notes.*', 'users.username')->where("user_id", $user_id);
		return $query->get();
	}

	static public function get_note_to_action($user_id, $note_id) {
		$query = Note::select('notes.*')->where('user_id', $user_id)->where('id', $note_id);
		return $query->first();
	}	

	static public function is_user_can_eddit_note($user_id, $note_id) {
		$query = Note::select('notes.*')->where('user_id', $user_id)->where('id', $note_id);
		if ($query->first()) {
			return true;
		}
		return false;
	}	

}
