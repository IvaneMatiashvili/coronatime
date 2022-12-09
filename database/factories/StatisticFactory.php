<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Statistic>
 */
class StatisticFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'country'                  => fake(5)->name(),
			'confirmed'                => fake(5)->numberBetween(),
			'recovered'                => fake(5)->numberBetween(),
			'deaths'                   => fake(5)->numberBetween(),
			'critical'                 => fake(5)->numberBetween(),
		];
	}
}
