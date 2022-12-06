<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmailRequest;
use App\Http\Requests\StoreResetPasswordRequest;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Throwable;

class ForgotPasswordController extends Controller
{
	public function showForgetPasswordForm()
	{
		return view('password-reset.forget-password');
	}

	  public function submitForgetPasswordForm(StoreEmailRequest $request)
	  {
	  	$token = Str::random(64);

	  	DB::table('password_resets')->insert([
	  		'email'      => $request->email,
	  		'token'      => $token,
	  		'created_at' => Carbon::now(),
	  	]);

	  	Mail::send('emails.recover-password', ['token' => $token], function ($message) use ($request) {
	  		$message->to($request->email);
	  		$message->subject('Reset Password');
	  	});

	  	return view('feedback.password-reset-feedback');
	  }

	  public function showResetPasswordForm($token)
	  {
	  	try
	  	{
	  		$email = DB::table('password_resets')
	  			  ->where([
	  			  	'token' => $token,
	  			  ])
	  			  ->first()->email;
	  	}
	  	catch(Throwable $e)
	  	{
	  		abort(404);
	  	}
	  	return view('password-reset.index', ['token' => $token]);
	  }

	  public function submitResetPasswordForm(StoreResetPasswordRequest $request)
	  {
	  	$updatePassword = DB::table('password_resets')
	  						  ->where([
	  						  	'token' => $request->token,
	  						  ])
	  						  ->first();

	  	$email = DB::table('password_resets')
	  		  ->where([
	  		  	'token' => $request->token,
	  		  ])
	  		  ->first()->email;

	  	$user = User::where('email', $email)
	  				  ->update(['password' => Hash::make($request->password)]);

	  	DB::table('password_resets')->where(['email'=> $email])->delete();

	  	return view('feedback.reset-successfully')->with('message', 'Your password has been changed!');
	  }
}
