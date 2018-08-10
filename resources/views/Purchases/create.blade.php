@extends('master')

@section('content')
<div class="container">
	<h1 align="Center">اضافه مشترى</h1>
	<form action="{{ action('PurchaseController@store')}}" method="post">
		{{csrf_field()}}
		<div class="form-group">
			<label style="float: right; font-size: 20px;">اسم المورد</label>
			<input type="text" name="resource_name" class="form-control"> 
		</div>
		<div class="form-group">
			<label style="float: right; font-size: 20px; ">تاريخ الشراء</label>
			<input type="date" name="purchase_date" class="form-control">
		</div>
		<div class="form-group">
			<label style="float: right; font-size: 20px;">اسم المشترى</label>
			<input type="text" name="officer" class="form-control">
		</div>
		<div class="form-group">
			<label style="float: right; font-size: 20px;">التكلفة</label>
			<input type="number" name="cost" class="form-control">
		</div>
		<div class="form-group">
			<label style="float: right; font-size: 20px;">تعليق</label>
			<textarea rows="4" name="comment" class="form-control" placeholder="تعليق" style="resize:none;"></textarea>
		</div>
		

		<input style="font-size: 20px;" type="submit" name="" value="اضافة مشترى" class="col-md-4 col-md-offset-4 btn btn-primary">
	</form>
</div>
@endsection