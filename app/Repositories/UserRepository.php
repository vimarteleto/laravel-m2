<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
	private $model;

	public function __construct(User $model)
	{
		$this->model = $model;
	}


	public function createUser(Request $request)
	{
		$user = $this->model->create([
			'username' => $request->username,
			'password' => Hash::make($request->password),
		]);

		$token = $user->createToken('auth_token')->plainTextToken;

		return (object)[
			'user' => $user,
			'token' => $token,
		];
	}


	public function getUserByUsername($username)
	{
		$user = $this->model->where('username', $username)->firstOrFail();

		$token = $user->createToken('auth_token')->plainTextToken;

		return (object)[
			'user' => $user,
			'token' => $token,
		];
	}
}