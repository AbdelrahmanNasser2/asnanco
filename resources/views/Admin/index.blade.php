@extends('master')

@section('content')
<div class="row">
	<div class="col-md-12">
		<br>
		<h3 align="center">Users Accounts</h3>
		<br>
		@if($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{$message}}</p>
		</div>
		@endif
		<div align="right">
			<a href="{{route('Admin.create')}}" class="btn btn-primary">Add New Account</a>
			<br>
			<br>

		</div>
		<table class="table table-bordered table-striped">
			<tr>
				<th>Username</th>
				<th>Password</th>
				<th>Role Type</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			@foreach($users as $row)
			<tr>
				<td>{{$row['UserName']}}</td>
				<td>{{$row['Password']}}</td>
				<td>{{$row['Role_type']}}</td>
				<td>
					<a href="{{action('UsersController@edit', $row['id'])}}" class="btn btn-warning">Edit</a>
				</td>
				<td>
					<form method="post" class="delete_form" 
					action="{{action('UsersController@destroy', $row['id'])}}">
					 	{{csrf_field()}}
					 	<input type="hidden" name="_method" value="DELETE" >
					 	<button type="submit" class="btn btn-danger">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
<script>
$(document).ready(function(){
	$('.delete_form').on('submit', function(){
		if(confirm("Are you sure you want to delete it ?"))
		{
			return true;
		}
		else
		{
			return false;
		}
	});
});
</script>
@endsection

