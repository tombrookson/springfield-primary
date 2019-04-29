<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models;

class Students extends Controller
{
	public function getIndex($id = null)
	{
		if ($id) {
			$tests = Models\Student::with([
				'tests'
			])->find($id);
		} else {
			$tests = Models\Student::all();
		}

		return response()->json($tests->toArray());
	}
}
