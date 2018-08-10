@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<br/>
		<h1 align="center">مرتبات</h1>
		<br/>
		@if($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{$message}}</p>
		</div>
		@endif
		<div align="right">
			<a href="{{route('Salary.create')}}" class="btn btn-primary">إضافة بيان مرتب</a>
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
				<td style="text-align: center;">
					<form method="post" action="{{action('SalaryController@destroy', $sal['id'])}}" id="delete_form" style="display: inline;">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-danger">حذف</button>
						
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
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#delete_form").on('submit', function(){
			if(confirm("هل تريد حذف هذه البيان ؟")){
				return true;
			}else{
				return false;
			}
		});
	});
</script>
@endsection