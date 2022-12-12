<?php

namespace App\Console\Commands;

use App\Models\Statistic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetStatisticsData extends Command
{
	protected $signature = 'get:statistic';

	protected $description = 'Get information about covid situation in the world';

	public function handle(): void
	{
		$responseCountries = Http::get('https://devtest.ge/countries')->json();

		foreach ($responseCountries as $value)
		{
			$responseCountryStatistics = Http::post('https://devtest.ge/get-country-statistics', [
				'code' => $value['code'],
			]);
			if (Statistic::select('*')->where('country->en', $value['name']['en'])->exists())
			{
				Statistic::where('country->en', $value['name']['en'])->update(
					['country'     => [
						'en' => $value['name']['en'],
						'ka' => $value['name']['ka'],
					]],
					[
						'confirmed' => $responseCountryStatistics['confirmed'],
						'recovered' => $responseCountryStatistics['recovered'],
						'critical'  => $responseCountryStatistics['critical'],
						'deaths'    => $responseCountryStatistics['deaths'],
					]
				);
			}
			else
			{
				Statistic::create(
					[
						'country' => [
							'en' => $value['name']['en'],
							'ka' => $value['name']['ka'],
						],
						'confirmed' => $responseCountryStatistics['confirmed'],
						'recovered' => $responseCountryStatistics['recovered'],
						'critical'  => $responseCountryStatistics['critical'],
						'deaths'    => $responseCountryStatistics['deaths'],
					]
				);
			}
		}
	}
}
