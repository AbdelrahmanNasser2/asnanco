@extends('master')

@section('content')
<div class="row">
@if(session('role') == 1)
	<div class="col-md-12">
		<h3 align="center">صيانة الاجهزه</h3>
		<br/>
		@if($message = Session::get('success'))
		<div class="alert alert-success" style="text-align:right;">
			<p>{{$message}}</p>
		</div>
		@endif
			<div class="col-md-12" style="padding: 0px;">
		<form method="get" action="{{ action('RepairDevicesController@show' , 1) }}">
			{{csrf_field()}}
			<div class="form-group col-md-4 col-md-offset-1" style="display:inline;">
				<label style="float:right; font-size: 20px;">الى</label>
				<input type="date" name="to" class="form-control" placeholder="الى" >
			</div>
			<div class="form-group col-md-4" style="display:inline;">
				<label style="float:right; font-size: 20px;">من</label>
				<input type="date" name="from" class="form-control" placeholder="من" >
			</div>
			<div class="form-group" style="display:inline; margin-top: 44px">
			<input type="submit" name="" value="تحويل الي اكسيل" class="btn btn-primary col-md-2" style="float: right; margin-top: 44px;">
			</div>
		</form>
	</div>
		<div align="right">
			<a href="{{ route('RepairDevices.create')}}" class="btn btn-primary col-md-2" style="float: right; margin-bottom: 15px;">إضافة فاتورة صيانة اجهزه</a>
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
				<tr>
					<td style="text-align: center;">
						<form method="post" class="delete_form" action="{{ action('RepairDevicesController@destroy', $repairDev['id'])}}" style="display: inline;">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<input type="submit" value="حذف" class="btn btn-danger">			
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
		$(".delete_form").on('submit' , function() {
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