<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
	use HasFactory;

	protected $guarded = [];

	public function scopeFilter($query, array $filters)
	{
		$query->when(
			$filters['search'] ?? false,
			fn ($query, $search) => $query
				->where('country', 'LIKE', "%{$search}%")
				->where('country', '!=', 'Worldwide')
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
		$query->when(
			!$filters,
			fn ($query) => $query
				->where('country', '!=', 'Worldwide')
		);
	}
}
