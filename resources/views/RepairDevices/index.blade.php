@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">

		<h3 align="center">صيانة الاجهزه</h3>
		<br/>
		@if($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{$message}}</p>
		</div>
		@endif
		<div align="right">
			<a href="{{route('RepairDevices.create')}}" class="btn btn-primary">إضافة فاتورة صيانة اجهزه</a>
			<br/>
			<br/>
		</div>
		<table class="table table-bordered table-striped">
			<thead>
				<th style="text-align: center;">تعديل/حذف</th>
				<th style="text-align: center;">تعليق</th>
				<th style="text-align: center;">التكلفه</th>
				<th style="text-align: center;">اسم المُتصل</th>
				<th style="text-align: center;">تاريخ زيارة الشركه</th>
				<th style="text-align: center;">تاريخ ابلاغ العطل</th>
				<th style="text-align: center;">تاريخ ظهور العطل</th>
				<th style="text-align: center;">اسم شركة الصيانه</th>
			</thead>
			<tbody>
				@foreach($repairDevice as $repairDev)
				<td style="text-align: center;">
					<form method="post" action="{{action('RepairDevicesController@destroy', $repairDev['id'])}}" id="delete_form" style="display: inline;">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-danger">حذف</button>
						
					</form>
					<a href="{{action('RepairDevicesController@edit', $repairDev['id'])}}" class="btn btn-success">تعديل</a>
				</td>
				<td style="text-align: center;">{{$repairDev['comment']}}</td>
				<td style="text-align: center;">{{$repairDev['cost']}}</td>
				<td style="text-align: center;">{{$repairDev['caller_name']}}</td>
				<td style="text-align: center;">{{$repairDev['visit_date']}}</td>
				<td style="text-align: center;">{{$repairDev['call_date']}}</td>
				<td style="text-align: center;">{{$repairDev['appearience_date']}}</td>
				<td style="text-align: center;">{{$repairDev['company_name']}}</td>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#delete_form").on('submit', function(){
			if(confirm("هل تريد حذف هذه الفاتورة ؟")){
				return true;
			}else{
				return false;
			}
		});
	});
</script>
@endsection