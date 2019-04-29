<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models;

class Index extends Controller
{
	public function getIndex()
	{
		return view('index.index');
	}
}
