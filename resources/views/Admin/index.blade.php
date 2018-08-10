@extends('master')

@section('content')
<div class="row">
	<div class="col-md-12">

		<h3 align="center">حسابات المستخدمين</h3>
		<br>
		@if($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{$message}}</p>
		</div>
		@endif
		<div align="right">
			<a href="{{route('Admin.create')}}" class="btn btn-primary">اضافه حساب جديد</a>
			<br>
			<br>

		</div>
		<table class="table table-bordered table-striped">
			<tr>
				<th style="text-align:center;">النوع</th>
				<th style="text-align:center;">كلمة السر</th>
				<th style="text-align:center;">الأسم</th>
				<th style="text-align:center;">تعديل</th>
				<th style="text-align:center;">حذف الحساب</th>
			</tr>
			@foreach($users as $row)
			<tr>
				<td align="center">{{$row['Role_type']}}</td>
				<td align="center">{{$row['Password']}}</td>
				<td align="right">{{$row['UserName']}}</td>
				<td align="center">
					<a href="{{action('UsersController@edit', $row['id'])}}" class="btn btn-warning">تعديل</a>
				</td>
				<td align="center">
					<form method="post" class="delete_form" 
					action="{{action('UsersController@destroy', $row['id'])}}">
					 	{{csrf_field()}}
					 	<input type="hidden" name="_method" value="DELETE" >
					 	<button type="submit" class="btn btn-danger">حذف</button>
					</form>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
<script>
$(document).ready(function(){
	$('.delete_form').on('submit', function(){
		if(confirm("Are you sure you want to delete it ?"))
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

