@extends('master')

@section('content')



<div class="row">
	<div class="col-md-12">
		@if($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
		@endif
		<div align="right">
			<h3 align="center">ملف المريض</h3>
			<br/>
			<br/>
		</div>
		<div align="right">
			<a href="{{url('Patients')}}" class="btn btn-primary">الرجوع</a>
			<br/>
			<br/>
		</div>
		<table class="table table-bordered table-striped">
			<tr>
				<td style="text-align: center;">{{ $patient['name'] }}</td>
				<td style="text-align: center;">الاسم</td>
			</tr>
			<tr>
				<td style="text-align: center;">{{ $patient['phone'] }}</td>
				<td style="text-align: center;">الموبايل</td>
			</tr>
			<tr>
				<td style="text-align: center;">{{ $patient['address'] }}</td>
				<td style="text-align: center;">العنوان</td>
			</tr>
			<tr>
				<td style="text-align: center;">{{ $patient['job'] }}</td>
				<td style="text-align: center;">الوظيفه</td>
			</tr>
			<tr>
				<td style="text-align: center;">{{ $patient['general_diagnosis'] }}</td>
				<td style="text-align: center;">التشخيص العام</td>
			</tr>
			<tr>
				<td style="text-align: center;">{{ $patient['other_diseases'] }}</td>
				<td style="text-align: center;">امراض اخرى</td>
			</tr>
			<tr>
				<td style="text-align: center;">
					@if(session('role') == 1)
					<form method="post" action="{{action('PatientsController@destroy' , $patient['id'] )}}" id="delete_form" style="display: inline;">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-danger">حذف</button>
						
					</form>
					<a href="{{ action('PatientsController@edit' , $patient['id'] ) }}" class="btn btn-success">تعديل</a>
					@endif
					<a href="{{ route('Visits.create' , $patient['id'] ) }}" class="btn btn-primary">إضافة زياره</a>
				</td>
				<td style="text-align: center;"></td>
			</tr>
		</table>
		
	</div>
</div>
	@if($visits)
	<div class="row">
		<table class="table table-bordered table-striped">
			<thead>
				@if(session('role') == 1)
				<th style="text-align: center;">تعديل / حذف</th>
				@endif
				<th style="text-align: center;">التعليق</th>
				<th style="text-align: center;">المتبقي</th>
				<th style="text-align: center;">المدفوع</th>
				<th style="text-align: center;">تاريخ الزياره</th>
				<th style="text-align: center;">اسم الدكتور</th>
			</thead>
			<tbody>
			@foreach($visits as $visit)
				<tr>
					@if(session('role') == 1)
					<td style="text-align: center;">
						<form method="delete" action="{{route('Visits.delete' , $visit['id'] )}}" id="delete_visit" style="display: inline;">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button type="submit" class="btn btn-danger">حذف</button>
						</form>
						<a href="{{ route('Visits.edit' , $visit['id'] ) }}" class="btn btn-success">تعديل</a>
					</td>
					@endif
					<td style="text-align: center;">{{ $visit['comment'] }}</td>
					<td style="text-align: center;">{{ $visit['remain'] }}</td>
					<td style="text-align: center;">{{ $visit['paid'] }}</td>
					<td style="text-align: center;">{{ $visit['visit_date'] }}</td>
					<td style="text-align: center;">{{ $visit['dr_name'] }}</td>
				</tr>
			@endforeach
			</tbody>
		</table>	
	</div>
	@endif
<script type="text/javascript">
	$(document).ready(function(){
		$("#delete_form").on('submit', function(){
			if(confirm("هل تريد حذف هذا العميل وزياراته؟")){
				return true;
			}else{
				return false;
			}
		});
		$("#delete_visit").on('submit', function(){
			if(confirm("هل تريد حذف هذه الزياره؟")){
				return true;
			}else{
				return false;
			}
		});
	});
</script>

@endsection