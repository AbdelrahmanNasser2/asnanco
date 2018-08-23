@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
	@if(session('role') == 1 || session('role') == 2 || session('role') == 3)                    
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
		<div class="alert alert-success" style="text-align:right;">
			<p>{{ $message }}</p>
		</div>
		@endif
		<form method="post" action="{{ route('Visits.store') }}">
			{{csrf_field()}}

			<div class="form-group">
				<label style="float: right; font-size: 20px;">اسم الدكتور</label>
				<input type="text" name="drname" class="form-control" placeholder="اسم الدكتور" required="" style="text-align:right;">
				<input type="hidden" name="patient_id" value="{{ $patient_id }}">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">تاريخ الزيارة</label>
				<input type="date" name="visit_date" class="form-control" placeholder="تاريخ الزياره" required="" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">المدفوع</label>
				<input type="number" step="0.01" min="0" name="paid" class="form-control" placeholder="المدفوع" required="" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">المتبقي</label>
				<input type="number" step="0.01" min="0" name="remain" class="form-control" placeholder="المتبقي" required="" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">تعليق</label>
				<textarea name="comment" rows="4" class="form-control" placeholder="تعليق" required="" style="resize: none;text-align:right;"></textarea>
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">نوع الزيارة</label>
				<select name="selection" class="form-control" style="font-size: 20px;direction: rtl;">
					<option name="زيارة اولى">زيارة اولى</option>
					<option name="متابعة">متابعة</option>
				</select>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-primary col-md-4 col-md-offset-4" value="إضافة" style="font-size: 20px;">
			</div>
		</form>
		<br/>
		<br/>
		<br/>
	@else
		@include('httpAuth')
	@endif
	</div>
</div>

@endsection