@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">

		<h3 align="center">المعامل</h3>
		<br/>
		@if($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{$message}}</p>
		</div>
		@endif
		<div align="right">
			<a href="{{route('Lab.create')}}" class="btn btn-primary">إضافة فاتورة معمل</a>
			<br/>
			<br/>
		</div>
		<table class="table table-bordered table-striped">
			<thead>
				<th style="text-align: center;">تعديل/حذف</th>
				<th style="text-align: center;">صورة</th>
				<th style="text-align: center;">التكلفه</th>
				<th style="text-align: center;">تاريخ الأستلام</th>
				<th style="text-align: center;">تاريخ التسليم</th>
				<th style="text-align: center;">اسم المعمل</th>
			</thead>
			<tbody>
				@foreach($labs as $lab)
				<td style="text-align: center;">
					<form method="post" action="{{action('LabController@destroy', $lab['id'])}}" id="delete_form" style="display: inline;">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-danger">حذف</button>
						
					</form>
					<a href="{{action('LabController@edit', $lab['id'])}}" class="btn btn-success">تعديل</a>
				</td>
				<td style="text-align: center;"><img src="/images/{{$lab['img_name']}}" width="100" height="100" /></td>
				<td style="text-align: center;">{{$lab['cost']}}</td>
				<td style="text-align: center;">{{$lab['receipt_date']}}</td>
				<td style="text-align: center;">{{$lab['delivery_date']}}</td>
				<td style="text-align: center;">{{$lab['lab_name']}}</td>
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