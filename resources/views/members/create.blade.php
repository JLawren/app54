@extends('layouts.app')

@section('content')
		@if(Session::has('message'))
			<p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('message') }}</p>
			
		@endif
		<form method="post" action="{{ route('member.create.post') }}">
			{{ csrf_field() }}
			@if ($member)
			<input type="hidden" value="{{@$member->id}}" name="id">
			@endif
			<input type="text" name="name" value="{{@$member->name}}">
			<input type="email" name="email" value="{{@$member->email}}">
			<input type="password" name="password" value="{{@$member->password}}">
			<input type="text" name="phone" value="{{@$member->phone}}">
			<input type="submit" name="">
		</form>	
		
@endsection