@extends('master')

@section('content')

<div class="row">
	<div class="col-mid-12">
		<br>
		<h3 style="text-align:center;">تعديل الحساب</h3>
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
				UserName}}" placeholder="الأسم" style="text-align:right;" />
			 </div>
			<div class="form-group">
				<input type="Password" name="Password" 
				class="form-control" value="{{$user->
				Password}}" placeholder="كلمة السر" style="text-align:right;" />
			</div>
			<div class="form-group" align="right">
				<label for="male" >: النوع</label>
					<br>
				Admin <input type="radio" name="Role_type" value="Admin" checked>
					<br>
  				Regular User <input type="radio" name="Role_type" value="User">
  					<br>
			</div>
			<div class="form-group" align="right">
				<input type="submit" class="btn 
				btn-primary" value="تعديل" />
			</div>
		</form>
	</div>
</div>


@endsection

