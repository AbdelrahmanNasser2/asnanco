@extends('master')

@section('content')
<div class="row">
@if(session('role') == 1)
	<div class="col-md-12">
		<h3 align="Center">المشتريات</h3>
		<br>
		@if($message = Session::get('success'))
		<div class="alert alert-success" style="text-align:right;">
			<p>{{$message}}</p>
		</div>
		@endif
		<div align="right">
			<a href="{{ action('PurchaseController@create') }}" class="btn btn-primary">اضافه مشترى جديد</a>
			<a href=" {{ action('PurchaseController@show' , 1) }}" class="btn btn-primary">تحويل الي اكسيل</a>
			<br>
			<br>
		</div>	
		<table class="table table-bordered table-striped">
			<thead>
				<th style="text-align:center;">تعديل / حذف</th>
				<th style="text-align:center;">اسم المٌشترى</th>
				<th style="text-align:center;">تعليق</th>
				<th style="text-align:center;">التكلفه</th>
				<th style="text-align:center;">تاريخ الشراء</th>
				<th style="text-align:center;">اسم المورد</th>
			</thead>
			<tbody>
				@foreach($purchases as $purchase)
				<tr>
					<td align="Center">
						<form method="post" class="delete_form" action="{{ action('PurchaseController@destroy',$purchase['id']) }}" style="display: inline;">
							{{csrf_field()}}
							{{ method_field('DELETE') }} 
							<input type="submit" value="حذف" class="btn btn-danger">
						</form>
						<a href="{{ action('PurchaseController@edit',$purchase['id']) }}" class="btn btn-success">تعديل</a>   
					</td>
					<td align="Center">{{ $purchase["officer"] }}</td>
					<td align="Center">{{ $purchase["comment"] }}</td>
					<td align="Center">{{ $purchase["cost"] }}</td>
					<td align="Center">{{ $purchase["purchase_date"] }}</td>
					<td align="Center">{{ $purchase["resource_name"] }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@else
	@include('httpAuth')
@endif
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$('.delete_form').on('submit' , function() {
			var con = confirm("هل تريد حذف هذه الفاتورة ؟");
			if(con){
				return true;
			}else{
				return false;
			}
		});
	});
</script>
@endsection