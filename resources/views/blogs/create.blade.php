<html>
	<body>
		<form method="post" action="{{ route('blog.create.post') }}">
			{{ csrf_field() }}
			<input type="text" name="title">
			<textarea name="body"></textarea>
			<input type="submit" name="">
		</form>

	</body>
</html>