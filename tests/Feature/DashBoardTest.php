<?php

namespace Tests\Feature;

use App\Models\Statistic;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashBoardTest extends TestCase
{
	use RefreshDatabase;

	public function test_user_should_redirect_from_dashboard_index_page_to_login_page_if_user_is_not_authenticated()
	{
		$response = $this->get(route('dashboard'));
		$response->assertRedirect(route('login'));
	}

	public function test_user_should_redirect_from_dashboard_country_statistics_page_to_login_page_if_user_is_not_authenticated()
	{
		$response = $this->get(route('dashboard.country-statistics'));
		$response->assertRedirect(route('login'));
	}

	public function test_user_should_see_dashboard_index_page_if_user_is_authenticated()
	{
		$user = User::factory()->create();
		$user->email_verified_at = Carbon::now();
		$user->save();
		auth()->login($user);

		$response = $this->get(route('dashboard'));

		$response->assertSuccessful();

		$response->assertViewIs('dashboard.index');
	}

	public function test_user_should_see_user_name_at_dashboard_index_page()
	{
		$user = User::factory()->create();
		$user->email_verified_at = Carbon::now();
		$user->save();
		auth()->login($user);

		$response = $this->get(route('dashboard'));

		$response->assertSee($user->name);

		$response->assertSuccessful();

		$response->assertViewIs('dashboard.index');
	}

	public function test_user_should_see_worldwide_statistics_at_dashboard_index_page()
	{
		$statistic = Statistic::factory()->create();
		$user = User::factory()->create();
		$user->email_verified_at = Carbon::now();
		$user->save();
		auth()->login($user);

		$response = $this->get(route('dashboard'));
		$worldwide = [
			'name'                     => __('content.worldwide'),
			'confirmed'                => Statistic::sum('confirmed'),
			'recovered'                => Statistic::sum('recovered'),
			'critical'                 => Statistic::sum('critical'),
			'deaths'                   => Statistic::sum('deaths'),
		];
		$response->assertSee($worldwide['name']);
		$response->assertSee(number_format((float)$worldwide['confirmed']));
		$response->assertSee(number_format((float)$worldwide['recovered']));
		$response->assertSee(number_format((float)$worldwide['deaths']));

		$response->assertSuccessful();
		$response->assertViewIs('dashboard.index');
	}

	public function test_user_should_see_user_name_at_country_statistics_index_page()
	{
		$user = User::factory()->create();
		$user->email_verified_at = Carbon::now();
		$user->save();
		auth()->login($user);

		$response = $this->get(route('dashboard.country-statistics'));

		$response->assertSee($user->name);

		$response->assertSuccessful();

		$response->assertViewIs('dashboard.country-statistics');
	}

	public function test_user_should_see_worldwide_statistics_at_dashboard_country_statistics_page()
	{
		$statistic = Statistic::factory()->create();
		$user = User::factory()->create();
		$user->email_verified_at = Carbon::now();
		$user->save();
		auth()->login($user);

		$response = $this->get(route('dashboard.country-statistics'));
		$worldwide = [
			'name'                     => __('content.worldwide'),
			'confirmed'                => Statistic::sum('confirmed'),
			'recovered'                => Statistic::sum('recovered'),
			'critical'                 => Statistic::sum('critical'),
			'deaths'                   => Statistic::sum('deaths'),
		];
		$response->assertSee($worldwide['name']);
		$response->assertSee(number_format((float)$worldwide['confirmed']));
		$response->assertSee(number_format((float)$worldwide['recovered']));
		$response->assertSee(number_format((float)$worldwide['deaths']));

		$response->assertSuccessful();
		$response->assertViewIs('dashboard.country-statistics');
	}

	public function test_user_should_get_searched_data_by_country_if_user_search()
	{
		$statistic = Statistic::factory()->create();
		$user = User::factory()->create();
		$user->email_verified_at = Carbon::now();
		$user->save();
		auth()->login($user);

		$response = $this->get(route('dashboard.country-statistics', 'search=al'));

		$response->assertSuccessful();
		$response->assertViewIs('dashboard.country-statistics');
	}

	public function test_user_should_get_sorting_data_by_country()
	{
		$statistic = Statistic::factory()->create();
		$user = User::factory()->create();
		$user->email_verified_at = Carbon::now();
		$user->save();
		auth()->login($user);

		$responseAsc = $this->get(route('dashboard.country-statistics', 'country=asc'));
		$responseDesc = $this->get(route('dashboard.country-statistics', 'country=desc'));

		$responseAsc->assertSuccessful();
		$responseAsc->assertViewIs('dashboard.country-statistics');
		$responseDesc->assertSuccessful();
		$responseDesc->assertViewIs('dashboard.country-statistics');
	}

	public function test_user_should_get_sorting_data_by_confirmed()
	{
		$statistic = Statistic::factory()->create();
		$user = User::factory()->create();
		$user->email_verified_at = Carbon::now();
		$user->save();
		auth()->login($user);

		$responseAsc = $this->get(route('dashboard.country-statistics', 'confirmed=asc'));
		$responseDesc = $this->get(route('dashboard.country-statistics', 'confirmed=desc'));

		$responseAsc->assertSuccessful();
		$responseAsc->assertViewIs('dashboard.country-statistics');
		$responseDesc->assertSuccessful();
		$responseDesc->assertViewIs('dashboard.country-statistics');
	}

	public function test_user_should_get_sorting_data_by_recovered()
	{
		$statistic = Statistic::factory()->create();
		$user = User::factory()->create();
		$user->email_verified_at = Carbon::now();
		$user->save();
		auth()->login($user);

		$responseAsc = $this->get(route('dashboard.country-statistics', 'recovered=asc'));
		$responseDesc = $this->get(route('dashboard.country-statistics', 'recovered=desc'));

		$responseAsc->assertSuccessful();
		$responseAsc->assertViewIs('dashboard.country-statistics');
		$responseDesc->assertSuccessful();
		$responseDesc->assertViewIs('dashboard.country-statistics');
	}

	public function test_user_should_get_sorting_data_by_deaths()
	{
		$statistic = Statistic::factory()->create();
		$user = User::factory()->create();
		$user->email_verified_at = Carbon::now();
		$user->save();
		auth()->login($user);

		$responseAsc = $this->get(route('dashboard.country-statistics', 'deaths=asc'));
		$responseDesc = $this->get(route('dashboard.country-statistics', 'deaths=desc'));

		$responseAsc->assertSuccessful();
		$responseAsc->assertViewIs('dashboard.country-statistics');
		$responseDesc->assertSuccessful();
		$responseDesc->assertViewIs('dashboard.country-statistics');
	}
}
