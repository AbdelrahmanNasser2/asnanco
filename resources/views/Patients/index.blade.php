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
		<div class="col-md-4"></div>
		<div align="center" class="form-group col-md-4">
			<input class="form-control" name="search" id="search" placeholder="بحث"/>
			<div id="searchList"></div>
			{{ csrf_field() }}
		</div>
		<div align="right">
			<a href="{{route('Patients.create')}}" class="btn btn-primary">إضافة مريض</a>
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