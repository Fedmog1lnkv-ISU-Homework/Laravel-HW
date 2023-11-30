<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

use Illuminate\Support\Facades\Hash;


class User extends Model implements Authenticatable
{
	use AuthenticatableTrait;
    use HasFactory;
	use SoftDeletes;

	protected $table = 'users';
	protected $fillable = [
        'username', 'password'
    ];

	static public function register_user($user_data) {
		$is_registered = User::where('username', $user_data['username'])->exists();
		if ($is_registered) {
			return null;
		}

		return User::create($user_data);
	}

	static public function login($user_data) {
		$user = User::where('username', $user_data['username'])->first();
		if ($user) {
			if (Hash::check($user_data['password'], $user->password)) {
				return $user;
			}
		}
		return null;
	}
}
