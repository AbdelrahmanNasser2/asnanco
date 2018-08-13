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
		<form method="post" action="{{ action('LabController@search') }}">
			{{csrf_field()}}
			
			<div class="form-group">
				<label style="float: right; font-size: 20px;">اسم المعمل</label>
				<input type="text" name="labName" class="form-control" placeholder="اسم المعمل" required="" style="text-align:right;">
			</div>

			<div class="form-group">
				<label style="float:right; font-size: 20px;">تاريخ الأستلام</label>
				<input type="date" name="recieptDate" class="form-control" placeholder="تاريخ الأستلام" required="">
			</div>
			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-primary col-md-4 col-md-offset-4" value="بحث" style="font-size: 20px;">
			</div>
		</form>
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