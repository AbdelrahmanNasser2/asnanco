@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<h3 align="center">المرضى</h3>
		<br/>
		@if($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{$message}}</p>
		</div>
		@endif
		<div class="col-md-4"></div>
		<div align="center" class="form-group col-md-4">
			<textarea class="form-control" name="search" id="search" rows="1" style="resize: none;" placeholder="بحث"></textarea>
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
					url: "{{ route('Patients.fetch') }}",
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