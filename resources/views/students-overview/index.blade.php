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
				<li><a href="/tests-overview">Tests</a></li>
				<li><a class="active" href="/students-overview">Students</a></li>
			</ul>
		</div>

		<div class="clear"></div>
	</div>
</header>

<div class="main">
	<h1>Students Overview</h1>

	<div class="tests">
		@foreach($students as $student)
			<div class="test">
				<div class="quick-info">
					<div class="name">{{ $student->last_name }}, {{ $student->first_name }}</div>

					<div class="average">Average Score: {{ $student->average_score }}%</div>
				</div>

				<div class="students">
					<div class="students-list">
						@foreach($student->tests as $test)
							<div class="student">
								<div class="student-name">{{ $test->name }} ({{ $test->code }})</div>

								<div class="student-score">{{ $test->pivot->result }}%</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
<div class="footer">
	<div class="wrapper">
	</div>
</div>
<script>
	$(document).ready(function(){
		App.Students.init();
	});
</script>
</body>
</html>