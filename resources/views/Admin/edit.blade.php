@extends('master')

@section('content')

<div class="row">
	<div class="col-mid-12">
		<br>
		<h3>Edit Account</h3>
		<br>
		@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
			</ul>
		</div>
		@endif

		<form method="post" action="{{action('UsersController@update', $id )}}">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="PATCH" />
			<div class="form-group">
				<input type="text" name="UserName" 
				class="form-control" value="{{$user->
				UserName}}" placeholder="Enter Username" />
			 </div>
			<div class="form-group">
				<input type="Password" name="Password" 
				class="form-control" value="{{$user->
				Password}}" placeholder="Enter Password" />
			</div>
			<div class="form-group">
				<label for="male">The Role Type :</label>
					<br>
				<input type="radio" name="Role_type" value="Admin" checked> Admin
					<br>
  				<input type="radio" name="Role_type" value="User"> Regular User
  					<br>
			</div>
			<div class="form-group">
				<input type="submit" class="btn 
				btn-primary" value="Edit" />
			</div>
		</form>
	</div>
</div>


@endsection

