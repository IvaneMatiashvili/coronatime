<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmailRequest;
use App\Http\Requests\StoreResetPasswordRequest;
use App\Mail\PasswordResetEmail;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
	public function submitForgetPasswordForm(StoreEmailRequest $request)
	{
		$token = Str::random(64);
		$user = PasswordReset::create([
			'email'      => $request->email,
			'token'      => $token,
			'created_at' => Carbon::now(),
		]);

		Mail::to($user->email)->send(new PasswordResetEmail($user));

		return view('feedback.password-reset-feedback');
	}

	public function showResetPasswordForm($token)
	{
		return view('password-reset.index', ['token' => $token]);
	}

	public function submitResetPasswordForm(StoreResetPasswordRequest $request)
	{
		$email = DB::table('password_resets')
			  ->where([
			  	'token' => $request->token,
			  ])
			  ->first()->email;

		$user = User::where('email', $email)
					  ->update(['password' => Hash::make($request->password)]);

		return view('feedback.reset-successfully')->with('message', 'Your password has been changed!');
	}
}
