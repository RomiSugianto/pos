@extends('master')
 
@section('content')
 
	@foreach($paymentmethod as $pm)
	<form action="../update" class="form" method="post">
		{{ csrf_field() }}
		<table class="table" width="25%" border="0">
			<tr>
				<td><input type="hidden" name="id" value="{{$pm->id}}"></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" required="required" value="{{$pm->name}}"></td>
			</tr>
				<td></td>
				<td><input type="submit" name="Submit" value="Submit"></td>
			</tr>
		</table>
	</form>

	@endforeach
 
@endsection