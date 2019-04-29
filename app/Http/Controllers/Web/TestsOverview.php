<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models;

class TestsOverview extends Controller
{
	public function getIndex()
	{
		return view('tests-overview.index', [
			'tests' => Models\Test::all(),
			'students' => Models\Student::orderBy('last_name', 'ASC')->get()
		]);
	}
}
