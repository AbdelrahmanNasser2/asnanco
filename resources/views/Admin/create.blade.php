@extends('master')

@section('content')
<div class="row">
	<div class="col-md-12">
	@if(session('role') == 1)
		<h3 align="center">اضافه حساب جديد</h3>
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
		<div class="alert alert-success" style="text-align:right;">
			<p>{{ \Session::get('success') }}</p>
		</div>
		@endif

		<form method="post" action="{{url('Admin')}}">
			{{csrf_field()}}
			<div class="form-group">
				<input type="text" name="UserName" class="form-control" placeholder="الأسم" style="text-align:right;"/>
			</div>
			<div class="form-group">
				<input type="password" name="Password" class="form-control" placeholder="كلمة السر" style="text-align:right;"/>
			</div>
			<div class="form-group" align="right">
				<label for="male">: النوع</label>
					<br>
				Admin <input type="radio" name="Role_type" value="1" checked>
					<br>
  				Regular User <input type="radio" name="Role_type" value="2">
  					<br>
			</div>
			<div class="form-group" align="right">
				<input type="submit" class="btn btn-primary" value="اضافه" />
			</div>
		</form>
	@else
		@include('httpAuth')
	@endif
	</div>
</div>
@endsection

