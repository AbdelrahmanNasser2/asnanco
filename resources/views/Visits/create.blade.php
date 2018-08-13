@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<h3 align="center">إضافة زياره</h3>
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

		@if($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
		@endif
		<form method="post" action="{{ route('Visits.store') }}">
			{{csrf_field()}}

			<div class="form-group">
				<label style="float: right; font-size: 20px;">اسم الدكتور</label>
				<input type="text" name="drname" class="form-control" placeholder="اسم الدكتور" required="">
				<input type="hidden" name="patient_id" value="{{ $patient_id }}">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">تاريخ الزياره</label>
				<input type="date" name="visit_date" class="form-control" placeholder="تاريخ الزياره" required="">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">المدفوع</label>
				<input type="number" step="0.01" min="0" name="paid" class="form-control" placeholder="المدفوع" required="">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">المتبقي</label>
				<input type="number" step="0.01" min="0" name="remain" class="form-control" placeholder="المتبقي" required="">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">تعليق</label>
				<textarea name="comment" rows="4" class="form-control" placeholder="تعليق" style="resize: none;"></textarea>
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