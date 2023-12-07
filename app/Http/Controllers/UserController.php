<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Note;
use App\Models\Comment;

class UserController extends Controller
{
    public function home() {
		$user = Auth::user();
		$notes = Note::get_all_user_notes($user->id);
		$comments = [];

		foreach ($notes as $note) {
			$comments[$note['id']] = Comment::get_comments_for_note($note['id']);
		}
		// dd($comments);
		return view('user.home', compact('comments', 'user', 'notes'));
	}
}
