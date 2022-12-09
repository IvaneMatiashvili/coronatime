<?php

namespace Tests\Feature;

use Tests\TestCase;

class LanguageControllerTest extends TestCase
{
	public function test_user_should_redirect_back_if_user_change_language_to_english()
	{
		$response = $this->get(route('lang.switch', 'en'));
		$response->assertStatus(302);
	}

	public function test_user_should_redirect_back_if_user_change_language_to_georgian()
	{
		$response = $this->get(route('lang.switch', 'ka'));
		$response->assertStatus(302);
	}
}
