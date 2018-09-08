@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
	@if(session('role') == 1 || session('role') == 3)
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
				<input type="text" name="drname" class="form-control" placeholder="اسم الدكتور" 
				required="" value="{{ $visit['dr_name'] }}" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">تاريخ الزياره</label>
				<input type="date" name="visit_date" class="form-control" placeholder="تاريخ الزياره" 
				required="" value="{{ $visit['visit_date'] }}" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">التكلفة</label>
				<input type="number" step="0.1" min="0" name="cost" class="form-control" placeholder="التكلفة" 
				required="" value="{{ $visit['cost'] }}" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">المدفوع</label>
				<input type="number" step="0.1" min="0" name="paid" class="form-control" placeholder="المدفوع" 
				required="" value="{{ $visit['paid'] }}" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">المتبقي</label>
				<input type="number" step="0.1" min="0" name="remain" class="form-control" placeholder="المتبقي" 
				required="" value="{{ $visit['remain'] }}" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">تعليق</label>
				<textarea name="comment" rows="4" class="form-control" placeholder="تعليق" 
				required="" style="resize: none; text-align:right;">{{ $visit['comment'] }}</textarea>
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">نوع الزيارة</label>
				<select name="selection" class="form-control" style="font-size: 20px;direction: rtl;">
					@if($visit['visit_type'] == 'زيارة اولى')
						<option name="زيارة اولى">زيارة اولى</option>
						<option name="متابعة">متابعة</option>
					@else
						<option name="زيارة اولى">زيارة اولى</option>
						<option name="متابعة" selected>متابعة</option>
					@endif
				</select>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-primary col-md-4 col-md-offset-4" value="تعديل" style="font-size: 20px;">
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