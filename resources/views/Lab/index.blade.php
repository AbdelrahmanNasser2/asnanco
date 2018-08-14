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

			<form method="post" action="{{ action('LabController@search') }}" class="col-md-10" style="display:inline;">
				{{csrf_field()}}
				
				<div class="form-group col-md-3" style="display:inline;">
					<input type="submit" name="submit" class="btn btn-primary col-md-4 col-md-offset-4" value="بحث" style="font-size: 20px; margin-top:35px;">
				</div>
				<div class="form-group col-md-4" style="display:inline;">
					<label style="float:right; font-size: 20px;">تاريخ الأستلام</label>
					<input type="date" name="recieptDate" class="form-control" placeholder="تاريخ الأستلام" required="">
				</div>
				<div class="form-group col-md-4" style="display:inline;">
					<label style="float:right; font-size: 20px;">اسم المعمل</label>
					<input type="text" name="labName" class="form-control" placeholder="اسم المعمل" required="" style="text-align:right;">
					<!-- <label style="float: right; font-size: 20px;">اسم المعمل</label> -->
				</div>
			</form>
			<a href="{{route('Lab.create')}}" class="btn btn-primary" style="margin-top:35px;">إضافة فاتورة معمل</a>
		</div>
		<table id="labs_table" class="table table-bordered table-striped" style="width:100%">
		<thead>
			<th style="text-align:center;">تعديل / حذف</th>
			<th style="text-align:center;">الصورة</th>
			<th style="text-align:center;">التكلفة</th>
			<th style="text-align:center;">تاريخ الأستلام</th>
			<th style="text-align:center;">تاريخ التسليم</th>
			<th style="text-align:center;">اسم المعمل</th>
		</thead>
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
		$('#student_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('lab.getdata') }}",
        "columns":[
            { "data": "" },
            { "data": "img_name" },
			{ "data": "cost" },
            { "data": "reciept_date" },
            { "data": "delivery_date" },
            { "data": "lab_name" }
        ]
     });
});
</script>
@endsection