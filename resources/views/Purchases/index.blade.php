@extends('master')

@section('content')
<div class="row">
	<h1 align="Center">المشتريات</h1>
<div align="right">
			<a href="{{ action('PurchaseController@create') }}" class="btn btn-primary">اضافه مشترى جديد</a>
			<br>
			<br>
		</div>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<td align="Center">اسم المشتري</td>
				<td align="Center">تاريخ الشراء</td>
				<td align="Center">التكلفه</td>
				<td align="Center">تعليق</td>
				<td align="Center">المكتب</td>
			</tr>
		</thead>
		<tbody>
			@foreach($purchases as $purchase)
				<td align="Center">{{ $purchase["resource_name"] }}</td>
				<td align="Center">{{ $purchase["purchase_date"] }}</td>
				<td align="Center">{{ $purchase["cost"] }}</td>
				<td align="Center">{{ $purchase["comment"] }}</td>
				<td align="Center">{{ $purchase["officer"] }}</td>
			@endforeach
		</tbody>
	</table>
</div>
@endsection