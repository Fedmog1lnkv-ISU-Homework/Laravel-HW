<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;

class NoteController extends Controller
{
    public function add_note_page() {
		return view('note.create-note');
	}

	public function update_note_page($id) {
		$user_id = Auth::id();
		$note = Note::get_note_to_action($user_id, $id);
		if ($note != null) {
			return view('note.update-note', compact('note'));
		} else {
			return back();
		}
	}

	public function all_notes() {
		$data = Note::get_all_notes();
		return view('note.all-notes', ['notes' => $data]);
	}

	public function note_by_id($id) {
        $note = Note::get_note($id);
		return view('note.note', compact('note'));
	}

	public function add_note(Request $request) {
		$data  = $request->validate([
			'title' => ['required', 'string'],
			'content' => ['required', 'string'],
		]);
		
		$data['user_id'] = Auth::id();
        
		$note = Note::create($data);
		return redirect('/note/' . $note->id);
    }

	public function delete(Request $request) {
		$data  = $request->validate([
			'id' => ['required', 'numeric'],
		]);
		Note::destroy($data['id']);
		return back();
	}

	public function update_note(Request $request) {
		$data  = $request->validate([
			'id' => ['required', 'numeric'],
			'title' => ['required', 'string'],
			'content' => ['required', 'string'],
		]);
		$user_id = Auth::id();
		if (Note::is_user_can_eddit_note($user_id, $data['id'])) {
			$note = Note::find($data['id']);
			$note->update($data);
			return redirect('/note/' . $note->id);
		}
		return back()->withErrors([
            'error' => 'You can not eddit this note',
        ]);
	}
}
