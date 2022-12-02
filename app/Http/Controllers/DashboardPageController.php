<?php

namespace App\Http\Controllers;

use App\Models\Statistic;

class DashboardPageController extends Controller
{
	public function index()
	{
		return view(
			'dashboard.index',
			[
				'user'                 => auth()->user(),
				'worldwide'            => Statistic::latest('created_at')->first(),
			]
		);
	}

	public function showCountriesStatistics()
	{
		return view('dashboard.country-statistics', [
			'statistics'           => Statistic::filter(request()->query())->get(),
			'user'                 => auth()->user(),
			'worldwide'            => Statistic::latest('created_at')->first(),
		]);
	}
}
