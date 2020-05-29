@extends('master')
 
@section('content')
 
	@foreach($product as $p)
	<form action="../update" class="form" method="post">
		{{ csrf_field() }}
		<table class="table" width="25%" border="0">
			<tr>
				<td><input type="hidden" name="id" value="{{$p->id}}"></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" required="required" value="{{$p->name}}"></td>
			</tr>
			<tr>
				<td>Buying Price</td>
				<td><input type="number" name="buying_price" min="0" step="any" max="999999999" value="{{$p->buying_price}}"/>
			</tr>
			<tr>
				<td>Selling Price</td>
				<td><input type="number" name="selling_price" min="0" step="any" max="999999999" value="{{$p->selling_price}}"/>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="Submit" value="Submit"></td>
			</tr>
		</table>
	</form>

	@endforeach
 
@endsection