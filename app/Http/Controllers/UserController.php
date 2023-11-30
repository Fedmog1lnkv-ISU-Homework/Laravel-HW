<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Note;

class UserController extends Controller
{
    public function home() {
		$user = Auth::user();
		$notes = Note::get_all_user_notes($user->id);
		return view('user.home', compact('user'), compact('notes'));
	}
}
