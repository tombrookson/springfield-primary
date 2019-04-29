<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models;

class Tests extends Controller
{
	public function getIndex($id = null)
	{
		if ($id) {
			$tests = Models\Test::with([
				'students' => function($q) {
					$q->orderBy('result', 'DESC')
						->orderBy('last_name', 'ASC');
				}
			])->find($id);
		} else {
			$tests = Models\Test::all();
		}

		return response()->json($tests->toArray());
	}

	public function postTest($id = null)
	{
		if (!$id)  return response()->json(['type' => 'ERROR', 'msg' => 'Please select a test']);

		$test = Models\Test::find($id);

		if (!$test) return response()->json(['type' => 'ERROR', 'msg' => 'Unable to find test']);

		if (!request()->get('student_id'))  return response()->json(['type' => 'ERROR', 'msg' => 'Please select a student']);

		$student = Models\Student::find(request()->get('student_id'));

		if (!$student) return response()->json(['type' => 'ERROR', 'msg' => 'Unable to find student']);

		$prevResult = $test->students()->find($student->id);

		if ($prevResult) return response()->json(['type' => 'ERROR', 'msg' => 'A result already exists for this student and test']);

		$result = request()->get('result') ?: 0;

		$test->students()->attach($student->id, ['result' => $result]);

		return response()->json(['type' => 'SUCCESS', 'msg' => 'Test result has been inserted']);
	}
}
