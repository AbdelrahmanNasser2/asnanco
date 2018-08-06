@extends('master')

@section('content')
<div class="row">
	<div class="col-md-12">
		<br>
		<h3 align="center">Create New Account</h3>
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
		@if(\Session::has('success'))
		<div class="alert alert-success">
			<p>{{ \Session::get('success') }}</p>
		</div>
		@endif

		<form method="post" action="{{url('Admin')}}">
			{{csrf_field()}}
			<div class="form-group">
				<input type="text" name="UserName" class="form-control" placeholder="Username" />
			</div>
			<div class="form-group">
				<input type="password" name="Password" class="form-control" placeholder="Password" />
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
				<input type="submit" class="btn btn-primary" />
			</div>
		</form>
	</div>
</div>
@endsection

