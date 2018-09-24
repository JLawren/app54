@extends('layouts.app')

@section('content')
		@if(Session::has('message'))
			<p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('message') }}</p>
		@endif
		<form action="{{route('attend.insert')}}" method="post">
			{{csrf_field()}}
			<input type="text" name="email">
		</form>	

		<table>
			<tr>
				<th>Attend at</th>
				<th>Member Name</th>
			</tr>
			@foreach ($attends as $attend)
			<tr>
				<td>{{$attend->created_at}}</td>
				<td>{{$attend->member->name}}</td>
			</tr>
			@endforeach
		</table>
		
@endsection