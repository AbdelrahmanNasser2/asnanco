@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<h3 align="center">تعديل زياره</h3>
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

		<form method="post" action="{{ route('Visits.update', $visit['id']) }}">
			{{csrf_field()}}

			<div class="form-group">
				<label style="float: right; font-size: 20px;">اسم الدكتور</label>
				<input type="text" name="drname" class="form-control" placeholder="اسم الدكتور" required="" value="{{ $visit['dr_name'] }}">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">تاريخ الزياره</label>
				<input type="date" name="visit_date" class="form-control" placeholder="تاريخ الزياره" required="" value="{{ $visit['visit_date'] }}">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">المدفوع</label>
				<input type="number" step="0.01" min="0" name="paid" class="form-control" placeholder="المدفوع" required="" value="{{ $visit['paid'] }}">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">المتبقي</label>
				<input type="number" step="0.01" min="0" name="remain" class="form-control" placeholder="المتبقي" required="" value="{{ $visit['remain'] }}">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">تعليق</label>
				<textarea name="comment" rows="4" class="form-control" placeholder="تعليق" style="resize: none;">{{ $visit['comment'] }}</textarea>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-primary col-md-4 col-md-offset-4" value="تعديل" style="font-size: 20px;">
			</div>
		</form>
		<br/>
		<br/>
		<br/>
	</div>
</div>

@endsection