@extends('master')

@section('content')
@if(session('role') == 1)
<div class="row">
	<div class="col-md-12">
		<h3 align="center">حسابات المستخدمين</h3>
		<br>
		@if($message = Session::get('success'))
		<div class="alert alert-success" style="text-align:right;">
			<p>{{$message}}</p>
		</div>
		@endif
		<div align="right">
			<a href="{{route('Admin.create')}}" class="btn btn-primary">اضافه حساب جديد</a>
			<br>
			<br>

		</div>
		<table class="table table-bordered table-striped">
			<thead>
				<th style="text-align:center;">تعديل / حذف</th>
				<th style="text-align:center;">النوع</th>
				<th style="text-align:center;">كلمة السر</th>
				<th style="text-align:center;">الأسم</th>
			</thead>
			@foreach($users as $row)
			<tr>
				<td align="center">
					<form method="post" class="delete_form" action="{{action('UsersController@destroy', $row['id'])}}" style="display: inline;">
					 	{{csrf_field()}}
					 	{{ method_field('DELETE') }} 
					 	<input type="submit" value="حذف" class="btn btn-danger">
					</form>
					<a href="{{action('UsersController@edit', $row['id'])}}" class="btn btn-success">تعديل</a>
				</td>
				<td align="center">@if($row['Role_type'] == 1) {{"Admin"}} @else {{"User"}} @endif</td>
				<td align="center">{{$row['Password']}}</td>
				<td align="right">{{$row['UserName']}}</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
@else
	@include('httpAuth')
@endif
<script>
$(document).ready(function(){
	$('.delete_form').on('submit', function(){
		var con = confirm("هل تريد حذف الحساب ؟");
		if(con)
		{
			return true;
		}
		else
		{
			return false;
		}
	});
});
</script>
@endsection

