@extends('master')

@section('content')
<div class="row">
	<h1 align="Center">تعديل مشترى</h1>
	<form method="post" action="{{ action('PurchaseController@update',$purchase['id']) }}">
		{{csrf_field()}}
		{{ method_field('PATCH') }}
		<div class="form-group">
		<label style="float: right; font-size: 20px;">اسم المورد</label><input type="text" name="resource_name" class="form-control" value="{{ $purchase['resource_name']}}">
		</div>
		<div class="form-group">
		<label style="float: right; font-size: 20px; ">تاريخ الشراء</label><input type="date" name="purchase_date" class="form-control" value="{{ $purchase['purchase_date']}}">
		</div>
		<div class="form-group">
		<label style="float: right; font-size: 20px;">اسم المشترى</label><input type="text" name="officer" class="form-control"  value="{{ $purchase['officer']}}"> 
		</div>
		<div class="form-group">
		<label style="float: right; font-size: 20px;">التكلفة</label><input type="number" name="cost" class="form-control"  value="{{ $purchase['cost']}}">
		</div>
		<div class="form-group">
		<label style="float: right; font-size: 20px;">تعليق</label><input type="textarea" name="comment" class="form-control"  value="{{ $purchase['comment']}}">
		</div>

		
		<input style="font-size: 20px;" type="submit" name="" value="تعديل " class="col-md-4 col-md-offset-4 btn btn-primary">
	</form>
</div>
@endsection