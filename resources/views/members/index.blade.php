@extends('layouts.app')

@section('content')
		<a href="{{route('member.create')}}"><button>Create</button></a>
		<table id="member">
			<thead>
			    <tr>
			        <th>Name</th>
			        <th>Email</th>
			        <th>Phone</th>
			        <th>Action</th>
			    </tr>
			</thead>
		</table>
		<script>
			$(document).ready( function () {
			    $('#member').DataTable( {
				    ajax: '{{route('member.list')}}',
				    columns: [
				        { data: 'name' },
				        { data: 'email' },
				        { data: 'phone' },
				        { data: null, 
				        	"render": function(data, type, row, meta){
				        		// console.log(data);
				        		var id = data.id;
				            if(type === 'display'){
				                data = '<a href="{{route('member.create',"_id_")}}">EDIT</a> <form method="post" action="{{route('member.delete')}}">{{csrf_field()}}<input type="hidden" value="_id_" name="id"><input type="submit" value="DELETE"></form>';
				                data = data.split('_id_').join(id);
				            }

            return data;
         } },
				        ]
				} );
			} );
		</script>	
		
@endsection