@extends('master')

@section('content')
<div class="row">

	<h3 align="Center">تعديل مشترى</h3>
	<form method="post" action="{{ action('PurchaseController@update',$purchase['id']) }}">
		{{csrf_field()}}
		{{ method_field('PATCH') }}
		<div class="form-group">
			<label style="float: right; font-size: 20px;">اسم المورد</label>
			<input type="text" name="resource_name" class="form-control" value="{{ $purchase['resource_name']}}" style="text-align:right;">
		</div>
		<div class="form-group">
			<label style="float: right; font-size: 20px; ">تاريخ الشراء</label>
			<input type="date" name="purchase_date" class="form-control" value="{{ $purchase['purchase_date']}}">
		</div>
		<div class="form-group">
			<label style="float: right; font-size: 20px;">اسم المشترى</label>
			<input type="text" name="officer" class="form-control"  value="{{ $purchase['officer']}}" style="text-align:right;"> 
		</div>
		<div class="form-group">
			<label style="float: right; font-size: 20px;">التكلفة</label>
			<input type="number" name="cost" class="form-control"  value="{{ $purchase['cost']}}" style="text-align:right;">
		</div>
		<div class="form-group">
			<label style="float: right; font-size: 20px;">تعليق</label>
			<textarea rows="4" name="comment" class="form-control" placeholder="تعليق" style="resize:none; text-align:right;">{{ $purchase['comment']}}</textarea>
		</div>

		
		<input style="font-size: 20px;" type="submit" name="" value="تعديل " class="col-md-4 col-md-offset-4 btn btn-primary">
	</form>
</div>
@endsection