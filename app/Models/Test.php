<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
	protected $table = 'tests';
	protected $appends = [
		'average_score',
		'highest_score',
		'lowest_score'
	];

	public function students()
	{
		return $this->belongsToMany(Student::class, 'test_results', 'test_id', 'student_id')
			->withPivot(['result']);
	}

	public function term()
	{
		return $this->belongsTo(Term::class);
	}

	public function getAverageScoreAttribute()
	{
		$totalScore = $this->students()->sum('result');

		$averageScore = $this->students()->count() ? $totalScore / $this->students()->count() : 0;

		return number_format($averageScore, 2);
	}

	public function getHighestScoreAttribute()
	{
		$highestStudent = $this->students()->orderBy('result', 'DESC')->first();

		$highestScore = $highestStudent ? $highestStudent->pivot->result : 0;

		return number_format($highestScore, 2);
	}

	public function getLowestScoreAttribute()
	{
		$lowestStudent = $this->students()->orderBy('result', 'ASC')->first();

		$lowestScore = $lowestStudent ? $lowestStudent->pivot->result : 0;

		return number_format($lowestScore, 2);
	}
}
