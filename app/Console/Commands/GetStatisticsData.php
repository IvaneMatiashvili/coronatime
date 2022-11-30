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
		$responseCountries = Http::get('https://devtest.ge/countries');

		$jsonDataCountries = $responseCountries->json();
		foreach ($jsonDataCountries as $Value)
		{
			$responseCountryStatistics = Http::post('https://devtest.ge/get-country-statistics', [
				'code' => $Value['code'],
			]);
			$jsonDataCountryStatistics = $responseCountryStatistics->json();

			Statistic::updateOrCreate([
				'country'   => $jsonDataCountryStatistics['country'],
				'confirmed' => $jsonDataCountryStatistics['confirmed'],
				'recovered' => $jsonDataCountryStatistics['recovered'],
				'critical'  => $jsonDataCountryStatistics['critical'],
				'deaths'    => $jsonDataCountryStatistics['deaths'],
			]);
		}
	}
}
