<?php

namespace App\Http\Controllers;

use App\Models\Statistic;

class DashboardPageController extends Controller
{
	public function index()
	{
		$worldwide = [
			'name'                     => 'Worldwide',
			'confirmed'                => Statistic::sum('confirmed'),
			'recovered'                => Statistic::sum('recovered'),
			'critical'                 => Statistic::sum('critical'),
			'deaths'                   => Statistic::sum('deaths'),
		];
		return view(
			'dashboard.index',
			[
				'user'                 => auth()->user(),
				'worldwide'            => $worldwide,
			]
		);
	}

	public function showCountriesStatistics()
	{
		$worldwide = [
			'name'                     => 'Worldwide',
			'confirmed'                => Statistic::sum('confirmed'),
			'recovered'                => Statistic::sum('recovered'),
			'critical'                 => Statistic::sum('critical'),
			'deaths'                   => Statistic::sum('deaths'),
		];
		return view('dashboard.country-statistics', [
			'statistics'           => Statistic::filter(request()->query())->get(),
			'user'                 => auth()->user(),
			'worldwide'            => $worldwide,
		]);
	}
}
