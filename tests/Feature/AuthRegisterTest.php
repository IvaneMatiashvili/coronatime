<?php

namespace Tests\Feature;

use App\Mail\VerifyEmail;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class AuthRegisterTest extends TestCase
{
	use RefreshDatabase;

	public function test_user_should_see_register_page()
	{
		$response = $this->get(route('register'));
		$response->assertSuccessful();

		$response->assertViewIs('session.register');
	}

	public function test_user_should_not_see_register_page_if_user_is_authorized()
	{
		$user = User::factory()->create();

		$response = $this->actingAs($user)->get(route('register'));

		$response->assertRedirect(route('dashboard'));
	}

	public function test_user_should_see_error_messages_if_input_fields_are_empty()
	{
		$response = $this->post(route('register.store'));

		$response->assertSessionHasErrors([
			'name',
			'email',
			'password',
		]);
	}

	public function test_user_should_see_error_message_if_name_field_is_empty()
	{
		$response = $this->post(route('register.store'), [
			'email'    => 'some@gmail.com',
			'password' => 'some',
		]);

		$response->assertSessionHasErrors([
			'name',
		]);
	}

	public function test_user_should_see_error_message_if_email_field_is_empty()
	{
		$response = $this->post(route('register.store'), [
			'name'     => 'name',
			'password' => 'some',
		]);

		$response->assertSessionHasErrors([
			'email',
		]);
	}

	public function test_user_should_see_error_message_if_password_field_is_empty()
	{
		$response = $this->post(route('register.store'), [
			'name'     => 'name',
			'email'    => 'some@gmail.com',
		]);

		$response->assertSessionHasErrors([
			'password',
		]);
	}

	public function test_user_should_see_error_message_if_name_length_is_less_then_3()
	{
		$response = $this->post(route('register.store'), [
			'name'     => 'na',
			'password' => 'some',
			'email'    => 'some@gmail.com',
		]);

		$response->assertSessionHasErrors([
			'name',
		]);
	}

	public function test_user_should_see_error_message_if_name_is_not_unique()
	{
		$user = User::factory()->create();
		$response = $this->post(route('register.store'), [
			'name'     => $user->name,
			'password' => 'some',
			'email'    => 'some@gmail.com',
		]);

		$response->assertSessionHasErrors([
			'name',
		]);
	}

	public function test_user_should_see_error_message_if_password_length_is_less_then_3()
	{
		$response = $this->post(route('register.store'), [
			'name'     => 'name',
			'password' => 'so',
			'email'    => 'some@gmail.com',
		]);

		$response->assertSessionHasErrors([
			'password',
		]);
	}

	public function test_user_should_see_error_message_if_password_is_not_unique()
	{
		$user = User::factory()->create();
		$response = $this->post(route('register.store'), [
			'name'     => 'some',
			'password' => 'some',
			'email'    => 'some@gmail.com',
		]);

		$response->assertSessionHasErrors([
			'password',
		]);
	}

	public function test_user_should_see_error_message_if_password_confirmation_dose_not_exixs()
	{
		$response = $this->post(route('register.store'), [
			'name'     => 'name',
			'password' => 'some',
			'email'    => 'some@gmail.com',
		]);

		$response->assertSessionHasErrors([
			'password',
		]);
	}

	public function test_user_should_see_error_message_if_password_confirmation_and_password_are_not_equal()
	{
		$response = $this->post(route('register.store'), [
			'name'                  => 'name',
			'password'              => 'some',
			'password_confirmation' => 'someee',
			'email'                 => 'some@gmail.com',
		]);

		$response->assertSessionHasErrors([
			'password',
		]);
	}

	public function test_user_should_not_see_error_messages_if_every_rule_is_followed()
	{
		$response = $this->post(route('register.store'), [
			'name'                  => 'iva',
			'email'                 => 'iva@gmail.com',
			'password'              => 'password',
			'password_confirmation' => 'password',
		]);
		$response->assertSuccessful();
		$response->assertViewIs('feedback.confirmation-feedback');
	}

	public function test_user_should_confrimation_feedback_afther_registration()
	{
		$response = $this->post(route('register.store'), [
			'name'                  => 'iva',
			'email'                 => 'iva@gmail.com',
			'password'              => 'password',
			'password_confirmation' => 'password',
		]);
		$response->assertViewIs('feedback.confirmation-feedback');
	}

	public function test_user_should_get_email_confirmation_page_link_at_mail()
	{
		$user = User::factory()->create();
		$createVerifiedUser = VerifyUser::create([
			'token'   => Str::random(60),
			'user_id' => $user->id,
		]);
		$mailable = new VerifyEmail($user);

		$mailable->assertSeeInHtml('VERIFY EMAIL');
	}

	public function test_user_should_see_feedback_and_verify_email_after_click_email_confirmation()
	{
		$user = User::factory()->create();
		$createVerifiedUser = VerifyUser::create([
			'token'   => Str::random(60),
			'user_id' => $user->id,
		]);

		$this->post(route('register.store'), [
			'name'     => $user->name,
			'email'    => $user->email,
			'password' => $user->password,
		]);
		$response = $this->get(route('user.verify', $createVerifiedUser->token));

		$verifiedUser = verifyUser::where('token', $createVerifiedUser->token)->first();
		$user = $verifiedUser->user;

		$response->assertViewIs('feedback.confirmed');

		$response->assertSuccessful();
	}

	public function test_user_should_redirect_register_page_if_errors_occurred()
	{
		$user = User::factory()->create();

		$this->post(route('register.store'), [
			'name'     => $user->name,
			'email'    => $user->email,
			'password' => $user->password,
		]);
		$response = $this->get(route('user.verify', 's1ljalsdl'));

		$response->assertRedirect('/register');
	}
}
