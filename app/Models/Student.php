<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $table = 'students';
	protected $appends = [
		'average_score'
	];

	public function tests()
	{
		return $this->belongsToMany(Test::class, 'test_results', 'student_id', 'test_id')
			->withPivot(['result']);
	}

	public function getAverageScoreAttribute()
	{
		$totalScore = $this->tests()->sum('result');

		$averageScore = $totalScore / $this->tests()->count();

		return number_format($averageScore, 2);
	}

}
