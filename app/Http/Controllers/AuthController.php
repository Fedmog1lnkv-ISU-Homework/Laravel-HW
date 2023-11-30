<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthController extends Controller
{

	public function login_page() {
		return view('auth.login');
	}

	public function register_page() {
		return view('auth.register');
	}

    public function login(Request $request) {

		$data  = $request->validate([
			'username' => ['required', 'string', 'min:3', 'max:20', 'regex:/^[a-zA-Z0-9\.\_\-\']+$/', 'alpha'],
			'password' => ['required', 'string', 'min:4', 'max:20', 'regex:/^[a-zA-Z0-9\.\_\-\']+$/', 'alpha'],
		]);

		$user = User::login($data);

		if ($user) {
			auth(guard: 'web')->login($user);
		}

		return back()->withErrors([
            'error' => 'Invalid username or password',
        ]);
	}

	public function register(Request $request) {
		$credentials = $request->validate([
			'username' => ['required', 'string', 'min:3', 'max:20', 'regex:/^[a-zA-Z0-9\.\_\-\']+$/', 'unique:users,username'],
			'password' => ['required', 'string', 'min:4', 'max:20', 'regex:/^[a-zA-Z0-9\.\_\-\']+$/', 'confirmed'],
		]);

		$credentials['password'] = $this->saltPassword($credentials['password']);
		$user = User::register_user($credentials);
		if ($user == null) {
			return "username already exists";
		}

		if ($user) {
			auth(guard: 'web')->login($user);
		}

		return redirect('/home');
	}

	private function saltPassword($pass) {
		return bcrypt($pass);
	}

	public function logout() {
		Auth::logout();
		return redirect('/login');
	}
}
