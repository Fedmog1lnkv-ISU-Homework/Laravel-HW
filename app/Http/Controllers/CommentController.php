<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create_comment(Request $request) {
		$data  = $request->validate([
			'note_id' => ['required', 'numeric'],
			'text' => ['required', 'string'],
		]);

		$data['user_id'] = Auth::id();
		$comment = Comment::create($data);
		return response()->json($comment);
	}

	public function delete(Request $request) {
		$data  = $request->validate([
			'id' => ['required', 'numeric'],
		]);
		Comment::destroy($data['id']);
		return back();
	}

	public function get_comments_for_note($note_id) {
		$data = Comment::get_comments_for_note($note_id);
		return response()->json($data);
	}

	public function get_comments_count_for_note($record_id) {
		$data = Comment::get_comments_number_for_note($record_id);
		return response()->json(['count' => $data]);
	}
}
