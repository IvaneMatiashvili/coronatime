<?php

namespace Tests\Feature;

use App\Mail\PasswordResetEmail;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class AuthPasswordResetTest extends TestCase
{
	use RefreshDatabase;

	public function test_user_should_see_forget_password_page()
	{
		$response = $this->get(route('forget.password.get'));
		$response->assertSuccessful();

		$response->assertViewIs('password-reset.forget-password');
	}

	public function test_user_should_see_error_message_if_email_field_is_empty()
	{
		$response = $this->post(route('forget.password.post'));

		$response->assertSessionHasErrors([
			'email',
		]);
	}

	public function test_user_should_see_error_message_if_email_field_is_not_type_of_email()
	{
		$response = $this->post(route('forget.password.post'), ['some.com']);

		$response->assertSessionHasErrors([
			'email',
		]);
	}

	public function test_user_should_see_error_message_if_user_does_not_exist_with_given_email()
	{
		$response = $this->post(route('forget.password.post'), ['some@gmail.com']);

		$response->assertSessionHasErrors([
			'email',
		]);
	}

	public function test_user_should_see_feedback_if_email_is_valid()
	{
		$user = User::factory()->create();
		$response = $this->post(route('forget.password.post'), [
			'email' => $user->email,
		]);
		$response->assertSuccessful();
		$response->assertViewIs('feedback.password-reset-feedback');
	}

	public function test_user_should_get_password_reset_page_link_at_mail()
	{
		$token = Str::random(64);
		$user = PasswordReset::create([
			'email'      => 'some@example.com',
			'token'      => $token,
			'created_at' => Carbon::now(),
		]);

		$mailable = new PasswordResetEmail($user);

		$mailable->assertSeeInHtml('Recover password');
	}

	public function test_user_should_see_password_reset_page_afther_clicks_Recover_password_btn_at_mail()
	{
		$token = Str::random(64);
		$user = PasswordReset::create([
			'email'      => 'some@example.com',
			'token'      => $token,
			'created_at' => Carbon::now(),
		]);
		$response = $this->get(route('reset.password.get', $user->token));
		$response->assertViewIs('password-reset.index');
	}

	public function test_user_should_see_error_messages_if_password_field_is_empty()
	{
		$response = $this->post(route('reset.password.post'));
		$response->assertSessionHasErrors([
			'password',
		]);
	}

	public function test_user_should_see_error_messages_if_password_confirmation_field_is_empty()
	{
		$response = $this->post(route('reset.password.post'), ['password' => 'gela']);
		$response->assertSessionHasErrors([
			'password',
		]);
	}

	public function test_user_should_see_error_messages_if_password_length_is_less_then_3()
	{
		$response = $this->post(route('reset.password.post'), ['password' => 'ge']);
		$response->assertSessionHasErrors([
			'password',
		]);
	}

	public function test_user_should_see_error_messages_if_password_and_password_confirmation_are_not_equal()
	{
		$response = $this->post(route('reset.password.post'), ['password' => 'ge', 'password_confirmation' => 'sa']);
		$response->assertSessionHasErrors([
			'password',
		]);
	}

	public function test_user_should_not_see_error_messages_if_every_rule_is_followed()
	{
		$response = $this->post(route('reset.password.post'), ['password' => 'gela', 'password_confirmation' => 'gela']);
		$response->assertStatus(500);
	}

	public function test_user_should_see_feedback_if_password_reset_is_successful()
	{
		$userCreate = User::factory()->create();
		$token = Str::random(64);
		$user = PasswordReset::create([
			'email'      => $userCreate->email,
			'token'      => $token,
			'created_at' => Carbon::now(),
		]);

		$password = 'password';
		$response = $this->post(route('reset.password.post'), [
			'password'              => $password,
			'password_confirmation' => $password,
			'token'                 => $user->token,
		]);

		$email = DB::table('password_resets')
			->where([
				'token' => $user->token,
			])
			->first()->email;

		$user = User::where('email', $email)
			->update(['password' => Hash::make($password)]);
		$response->assertStatus(200);

		$response->assertViewIs('feedback.reset-successfully');
	}
}
