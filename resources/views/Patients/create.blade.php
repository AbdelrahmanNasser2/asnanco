@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<h3 align="center">إضافة مريض</h3>
		<br/>
		@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
		@endif
		<form method="post" action="{{ url('Patients') }}">
			{{csrf_field()}}

			<div class="form-group">
				<label style="float: right; font-size: 20px;">الاسم</label>
				<input type="text" name="name" class="form-control" placeholder="اسم المريض" required="">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">رقم الموبايل</label>
				<input type="phone" name="phone" class="form-control" placeholder="رقم الموبايل" required="">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">العنوان</label>
				<input type="text" name="address" class="form-control" placeholder="العنوان" required="">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">الوظيفه</label>
				<input type="text" name="job" class="form-control" placeholder="الوظيفه" required="">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">التشخيص العام</label>
				<input type="text" name="general_diagnosis" class="form-control" placeholder="التشخيص العام" required="">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">امراض اخرى</label>
				<textarea name="other_diseases" rows="4" class="form-control" placeholder="امراض اخرى" style="resize: none;"></textarea>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-primary col-md-4 col-md-offset-4" value="إضافة" style="font-size: 20px;">
			</div>
		</form>
		<br/>
		<br/>
		<br/>
	</div>
</div>

@endsection