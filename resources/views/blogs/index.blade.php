<html>
	<body>
		
		<table>
			<tr>
				<th>Title</th>
				<th>Body</th>
				<th>Action</th>
			</tr>

			@foreach($blogs as $blog)
			<tr>
				<td>{{$blog->title}}</td>
				<td>{{$blog->body}}</td>
				<td>
					<a href="{{route('blog.edit',$blog->id)}}">Edit</a> 
					<form method="post" action="{{route('blog.delete')}}">
						{{csrf_field()}} 
						<input type="hidden" value="{{$blog->id}}" name="id">
						<input type="submit" value="delete">
					</form>
					</a>
				</td>
			</tr>
			@endforeach
		</table>

	</body>
</html>