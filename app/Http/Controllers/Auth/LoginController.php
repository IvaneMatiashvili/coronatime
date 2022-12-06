<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
	public function login(StoreLoginRequest $request)
	{
		$attributes = $request->validated();
		$remember = false;

		if ($request->has('remember-me'))
		{
			$remember = true;
		}

		if ((Auth::attempt(['email' => $attributes['name'], 'password' => $attributes['password']], $remember)) || (auth()->attempt($attributes, $remember)))
		{
			if (auth()->user()->email_verified_at === null)
			{
				return redirect(route('login'))->with('info', __('content.please-verify'));
			}
			return redirect(route('dashboard'));
		}

		throw ValidationException::withMessages([
			'name'     => __('validation.custom.name.username_does_not_exist'),
			'password' => __('validation.custom.password.password_does_not_exist'),
		]);
	}

	public function logout()
	{
		auth()->logout();
		return redirect(route('login'));
	}
}
