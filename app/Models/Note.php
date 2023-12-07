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
        'user_id', 'title','content', 'is_published', 'publisher_time', 'is_publish_at_time', 'is_removed_from_publication'
    ];


	static public function add_note($data) {
		if (!isset($data['is_publish_at_time'])) {
			$data['is_publish_at_time'] = false;
		} else {
			$data['is_publish_at_time'] = true;
		}
		if (!$data['is_publish_at_time']) {
			$data['publisher_time'] = now();
			$data['is_published'] = true;
		} else {
			$data['is_published'] = false;
		}
		// dd($data);

		return Note::create($data);
	}


	static public function get_note($id) {
		$query = Note::join('users', 'notes.user_id', '=', 'users.id')->select('notes.*', 'users.username')->where("notes.id", $id);
		return $query->first();
	}

	static public function get_all_notes() {
		$query = Note::join('users', 'notes.user_id', '=', 'users.id')
		->select('notes.*', 'users.username')
		->where('notes.is_published', true)
		->where('notes.is_removed_from_publication', false)
		->orderBy('notes.publisher_time', 'desc');
		return $query->get();
	}

	static public function get_all_user_notes($user_id) {
		$query = Note::join('users', 'notes.user_id', '=', 'users.id')
		->select('notes.*', 'users.username')
		->where("user_id", $user_id);
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

	static public function publish_unpublished_notes() {
		$now = now();
	
		$affectedRows  = Note::where('is_publish_at_time', true)
			->where('is_published', false)
			->where('publisher_time', '<=', $now)
			->where('is_removed_from_publication', false)
			->update(['is_published' => true]);
	
		return $affectedRows ;
	}

}
