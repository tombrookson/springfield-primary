<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Springfield Primary Portal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<!-- CSS -->
	<link href="https://fonts.googleapis.com/css?family=Bai+Jamjuree:400,400i,600" rel="stylesheet">

	<link rel="stylesheet" href="/css/reset.css" />
	<link rel="stylesheet" href="/css/app.css" />

	<!-- JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="/js/app.js"></script>
</head>
<body>
<header>
	<div class="wrapper">
		<div class="app-name">SpringfieldPrimaryPortal</div>

		<div class="menu">
			<ul>
				<li><a class="active" href="/tests-overview">Tests</a></li>
				<li><a href="/students-overview">Students</a></li>
			</ul>
		</div>

		<div class="clear"></div>
	</div>
</header>

<div class="main">
	<h1>Tests Overview</h1>
	<button class="app-button-default add-result-btn">Add Result</button>

	<div class="tests">
		@foreach($tests as $k => $test)
			<div class="test">
				<div class="quick-info">
					<div class="code">{{ $test->code }}</div>

					<div class="name">{{ $test->name }}</div>

					<div class="term">{{ $test->term->name }}</div>

					<div class="average">Average Score: {{ $test->average_score }}%</div>
				</div>

				<div class="students">
					<div class="highest-score">Highest: <strong>{{ $test->highest_score }}%</strong></div>
					<div class="lowest-score">Lowest: <strong>{{ $test->lowest_score }}%</strong></div>
					<div class="results-count">Results Count: <strong>{{ $test->students()->count() }}</strong></div>
					<div class="average-score">Average: <strong>{{ $test->average_score }}%</strong></div>

					<div class="students-list">
						@foreach($test->students as $student)
							<div class="student">
								<div class="student-name">{{ $student->last_name }}, {{ $student->first_name }}</div>

								<div class="student-score">{{ $student->pivot->result }}%</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>

<div class="add-result">
	<h3>Add Result</h3>

	<div class="add-result-close">x</div>

	<div class="form">
		<select name="test" id="add-result-test">
			<option value="">Select test...</option>
			@foreach($tests as $test)
				<option value="{{ $test->id }}">{{ $test->name }} ({{ $test->code }})</option>
			@endforeach
		</select>

		<select name="student" id="add-result-student">
			<option value="">Select student...</option>
			@foreach($students as $student)
				<option value="{{ $student->id }}">{{ $student->last_name }}, {{ $student->first_name }}</option>
			@endforeach
		</select>

		<input type="number" max="100" min="0" step=".01" placeholder="Result" name="result" id="add-result-result" />
	</div>

	<div class="add-result-error"></div>

	<button class="app-button-default" id="add-result-submit">Add</button>

	<div class="clear"></div>
</div>
<div class="add-result-bg"></div>


<div class="footer">
	<div class="wrapper">
	</div>
</div>
<script>
	$(document).ready(function(){
		App.Tests.init();
	});
</script>
</body>
</html>