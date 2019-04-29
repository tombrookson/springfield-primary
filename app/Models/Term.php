<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
	protected $table = 'terms';

	public function tests()
	{
		return $this->hasMany(Test::class);
	}
}
