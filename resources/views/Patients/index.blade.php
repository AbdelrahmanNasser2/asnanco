@extends('master')

@section('content')
<style type="text/css">
	li a{
		color: #000;
	}
	li a:hover{
		color: #0275d8;
	}
</style>
<div class="row">
	<div class="col-md-12">
		<h3 align="center">المرضى</h3>
		<br/>
		@if($message = Session::get('success'))
		<div class="alert alert-success" align="right">
			<p>{{$message}}</p>
		</div>
		@endif
		<div class="col-md-12" style="padding: 0px;">
		<form method="get" action="{{route('Patients.excel',1)}}">
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
			<input type="submit" name="" value="تحويل جميع  بيانات المرضي الي اكسيل" class="btn btn-primary col-md-3" style="float: right; margin-top: 44px;">
			</div>
		</form>
	</div>
	<div class="col-md-12" style="padding: 0px;">
		<form method="get" action="{{route('Visits.excel',1)}}">
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
			<input type="submit" name="" value="تحويل جميع  بيانات الزيارات الي اكسيل" class="btn btn-primary col-md-3" style="float: right; margin-top: 44px;">
			</div>
		</form>
	</div>
		<div class="col-md-4"></div>
		<div align="center" class="form-group col-md-4">
			<input class="form-control" name="search" id="search" placeholder="بحث"/>
			<div id="searchList"></div>
			{{ csrf_field() }}
		</div>
		<div style="float: right; padding: 0px" class="col-md-4">
			<a href="{{route('Patients.create')}}" class="btn btn-primary col-md-9" style="margin-left: 93px;">إضافة مريض</a>
			<br/>
			<br/>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#search").keyup(function(){
			var query = $(this).val();
			if(query != ''){

				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: "{{ url('/') }}" + "/Patients/fetch",
					method:"POST",
					data:{query:query , _token:_token},
					success:function(data){
						$("#searchList").fadeIn();
						$("#searchList").html(data);
					}
				});

			}
		});
	});
</script>

@endsection