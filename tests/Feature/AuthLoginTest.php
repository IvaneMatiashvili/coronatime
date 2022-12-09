<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class AuthLoginTest extends TestCase
{
	use RefreshDatabase;

	public function test_user_should_see_login_page()
	{
		$response = $this->get(route('login'));
		$response->assertSuccessful();

		$response->assertViewIs('session.login');
	}

	public function test_user_cannot_view_a_login_form_when_authenticated()
	{
		$user = User::factory()->create();

		$response = $this->actingAs($user)->get(route('login'));

		$response->assertRedirect('/');
	}

	public function test_user_should_not_see_error_messages_if_input_fields_are_full()
	{
		$response = $this->post(route('login.post'), ['name' => 'barambo', 'password' => 'nastia']);

		$response->assertSessionHasErrors([
			'name',
			'password',
		]);
	}

	public function test_user_should_not_see_error_messages_if_input_fields_are_empty()
	{
		$response = $this->post(route('login.post'));

		$response->assertSessionHasErrors([
			'name',
			'password',
		]);
	}

	public function test_user_should_not_see_error_messages_if_password_is_empty()
	{
		$response = $this->post(route('login.post'), ['name' => 'misha']);

		$response->assertSessionHasErrors([
			'password',
		]);
	}

	public function test_user_should_not_see_error_messages_if_name_is_empty()
	{
		$response = $this->post(route('login.post'), ['password' => 'barambo']);

		$response->assertSessionHasErrors([
			'name',
		]);
	}

	public function test_user_should_not_see_error_messages_if_name_length_less_then_3()
	{
		$response = $this->post(route('login.post'), ['password' => 'barambo', 'name' => 'sa']);

		$response->assertSessionHasErrors([
			'name',
		]);
	}

	public function test_user_should_not_see_error_messages_if_name_and_password_does_not_exist()
	{
		$response = $this->post(route('login.post'), ['password' => 'barambo', 'name' => 'sasdsd']);

		$response->assertSessionHasErrors([
			'name',
			'password',
		]);
	}

	public function test_user_should_not_see_error_messages_if_every_rule_is_followed()
	{
		$password = 'some';
		$name = 'some';
		$this->post(route('register.store'), [
			'name'                  => $name,
			'password'              => $password,
			'password_confirmation' => $password,
			'email'                 => 'some@gmail.com',
		]);

		$user = User::first();
		$user->email_verified_at = Carbon::now();
		$user->save();

		$response = $this->post(route('login.post'), ['password' => $password, 'name' => $name]);
		$response->assertRedirect(route('dashboard'));
	}

	public function test_user_should_redirect_to_login_page_if_user_is_unauthorized()
	{
		$response = $this->get(route('dashboard'));

		$response->assertRedirect(route('login'));
	}

	public function test_user_should_redirect_login_page_if_email_confirmation_does_not_exit()
	{
		$user = User::factory()->create([
			'password'          => 'i-love-laravel',
			'email_verified_at' => null,
		]);

		$response = $this->post(route('login.post'), [
			'name'              => $user->name,
			'password'          => 'i-love-laravel',
		]);

		$response->assertRedirect(route('login'));
		$this->assertAuthenticatedAs($user);
	}

	public function test_user_information_will_save_in_session_if_user_marks_remember_me_check_box()
	{
		$user = User::factory()->create([
			'password' => 'i-love-laravel',
		]);

		$response = $this->post('/login', [
			'name'              => $user->email,
			'password'          => 'i-love-laravel',
			'remember-me'       => true,
		]);

		$response->assertRedirect(route('dashboard'));
		$this->assertAuthenticatedAs($user);
	}

	public function test_user_should_redirect_login_page_if_user_is_not_authorized()
	{
		$user = User::factory()->create();
		$this->actingAs($user)->get(route('logout'))->assertRedirect(route('login'));
	}

	public function test_user_shpuld_logout_and_redirect_to_login_page_when_user_clicks_logout_button()
	{
		$this->get(route('logout'))->assertRedirect(route('login'));
	}
}
