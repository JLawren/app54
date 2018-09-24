<html>
	<body>
		@foreach ($tasks as $task)
			<li>{{ $task->body }}</li>
		@endforeach
	</body>
</html>