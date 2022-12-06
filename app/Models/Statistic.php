<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Statistic extends Model
{
	use HasFactory;

	use HasTranslations;

	public $translatable = ['country'];

	protected $guarded = [];

	public function scopeFilter($query, array $filters)
	{
		$query->when(
			$filters['search'] ?? false,
			function ($query, $search) {
				$search = trim($search);
				$query
					->where('country->en', 'LIKE', "%{$search}%")
					->orWhere('country->ka', 'LIKE', "%{$search}%");
			}
		);
		foreach ($filters as $kay => $param)
		{
			if ($kay === 'search')
			{
				continue;
			}
			$query->when(
				$param ?? false,
				function ($query, $param) use ($kay) {
					if ($param === 'asc')
					{
						$query->
						orderBy($kay, 'asc');
					}
					else
					{
						$query->
						orderBy($kay, 'desc');
					}
				}
			);
		}
	}
}
