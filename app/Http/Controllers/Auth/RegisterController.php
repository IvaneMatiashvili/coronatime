<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegistrationRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
	public function store(StoreRegistrationRequest $request)
	{
		$validated = $request->validated();

		$user = User::create($validated);

		VerifyUser::create([
			'token'   => Str::random(60),
			'user_id' => $user->id,
		]);

		Mail::to($user->email)->send(new VerifyEmail($user));
		return view('feedback.confirmation-feedback');
	}

	public function verifyEmail($token)
	{
		$verifiedUser = verifyUser::where('token', $token)->first();
		if (isset($verifiedUser))
		{
			$user = $verifiedUser->user;
			$user->email_verified_at = Carbon::now();
			$user->save();
			return view('feedback.confirmed')->with('success', 'Email verified');
		}
		else
		{
			return redirect(route('register'))->with('error', 'something went wrong !');
		}
	}
}
