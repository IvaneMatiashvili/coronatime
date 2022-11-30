<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoginRequest;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
	public function login(StoreLoginRequest $request)
	{
		$attributes = $request->validated();

		if (auth()->attempt($attributes))
		{
			if (auth()->user()->email_verified_at === null)
			{
				return redirect(route('login'))->with('info', 'please verify your email to continue');
			}
			return redirect(route('dashboard'));
		}

		throw ValidationException::withMessages([
			'name'     => 'username does not exist',
			'password' => 'password does not exist',
		]);
	}

	public function logout()
	{
		auth()->logout();
		return redirect(route('login'));
	}
}
