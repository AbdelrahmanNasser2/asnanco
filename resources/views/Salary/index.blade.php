@extends('master')

@section('content')
<div class="row">
@if(session('role') == 1)
	<div class="col-md-12">
		<h3 align="center">مرتبات</h3>
		<br/>
		@if($message = Session::get('success'))
		<div class="alert alert-success" style="text-align:right;">
			<p>{{$message}}</p>
		</div>
		@endif
		<div align="right">
			<a href="{{ route('Salary.create') }}" class="btn btn-primary">إضافة بيان مرتب</a>
			<a href=" {{ action('SalaryController@show',1) }}" class="btn btn-primary">تحويل الي اكسيل</a>
			<br/>
			<br/>
		</div>
		<table class="table table-bordered table-striped">
			<thead>
				<th style="text-align: center;">تعديل/حذف</th>
				<th style="text-align: center;">صافى المرتب</th>
				<th style="text-align: center;">قيمة الخصومات</th>
				<th style="text-align: center;">المرتب</th>
				<th style="text-align: center;">عدد أيام التأخير</th>
				<th style="text-align: center;">عدد أيام الغياب</th>
				<th style="text-align: center;">عدد أيام الشغل</th>
				<th style="text-align: center;">تاريخ الأستلام</th>
				<th style="text-align: center;">اسم الموظف</th>
			</thead>
			<tbody>
				@foreach($Salary as $sal)
				<tr>
					<td style="text-align: center;">
						<form method="post" class="delete_form" action="{{action('SalaryController@destroy', $sal['id'])}}" style="display: inline;">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<input type="submit" value="حذف" class="btn btn-danger">
						</form>
						<a href="{{action('SalaryController@edit', $sal['id'])}}" class="btn btn-success">تعديل</a>
					</td>
					<td style="text-align: center;">{{$sal['net_salary']}}</td>
					<td style="text-align: center;">{{$sal['discount']}}</td>
					<td style="text-align: center;">{{$sal['salary']}}</td>
					<td style="text-align: center;">{{$sal['delay_days']}}</td>
					<td style="text-align: center;">{{$sal['absence_days']}}</td>
					<td style="text-align: center;">{{$sal['work_days']}}</td>
					<td style="text-align: center;">{{$sal['delivery_date']}}</td>
					<td style="text-align: center;">{{$sal['emp_name']}}</td>
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
	$(document).ready(function(){
		$(".delete_form").on('submit', function(){
			var con = confirm("هل تريد حذف هذه البيان ؟");
			if(con){
				return true;
			}else{
				return false;
			}
		});
	});
</script>
@endsection