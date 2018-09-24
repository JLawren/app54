<html>
	<body>
		<form method="post" action="{{ route('blog.edit.post') }}">
			{{ csrf_field() }}
			<input type="hidden" name="id" value="{{$blog->id}}">
			<input type="text" name="title" value="{{$blog->title}}">
			<textarea name="body">{{$blog->body}}</textarea>
			<input type="submit" name="">
		</form>

	</body>
</html>