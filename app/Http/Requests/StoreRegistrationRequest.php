<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRegistrationRequest extends FormRequest
{
	public function rules()
	{
		return [
			'name'     => ['required', 'min:3', Rule::unique('users', 'name')],
			'email'    => ['required', 'email', Rule::unique('users', 'email')],
			'password' => 'required|confirmed|min:3',
		];
	}
}
