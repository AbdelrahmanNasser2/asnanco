@extends('master')

@section('content')
<div class="row">

	<h3 align="Center">المعامل</h3>
		<div align="right">
			<a href="{{url('Lab')}}" class="btn btn-primary">الرجوع</a>
			<br/>
			<br/>
		</div>
		<table class="table table-bordered table-striped">
		<thead>
			
			<th align="Center">الصورة</th>
			<th align="Center">التكلفة</th>
			<th align="Center">تاريخ الأستلام</th>
			<th align="Center">تاريخ التسليم</th>
			<th align="Center">اسم المعمل</th>
			<th align="Center">تعديل</th>
			<th align="Center">حذف</th>
			
		</thead>
		<tbody>
			@foreach($lab as $lb)
			<tr>
				<td align="Center"><img src="/images/{{ $lb['img_name'] }}" width="100" height="100"></td>
				<td align="Center">{{ $lb["cost"] }}</td>
				<td align="Center">{{ $lb["receipt_date"] }}</td>
				<td align="Center">{{ $lb["delivery_date"] }}</td>
				<td align="Center">{{ $lb["lab_name"] }}</td>
				<td align="Center"><a href="{{ action('LabController@edit',$lb['id']) }}" class="btn btn-success">تعديل</a></td>
				<td align="Center">
					<form method="post" action="{{ action('LabController@destroy',$lb['id']) }}" style="display: inline;">
						{{csrf_field()}}
						{{ method_field('DELETE') }}
						<input type="submit" name="" value="حذف"   class="btn btn-danger">
					</form>
								   
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$('#del').on('submit' , function() {
			var con = confirm("Ary you sure you want delete this purchase?");
			if(con){
				return true;
			}else{
				return false;
			}

		});
	});
</script>
@endsection