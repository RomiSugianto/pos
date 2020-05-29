@extends('master')
 
@section('content')
 

	<table class="table" width="25%" border="1">
@foreach($salestransaction as $s)
		<tr>
			<td>Transaction ID</td>
			<td>{{ $s->id }}</td>
		</tr>
		<tr>
			<td>Transaction Date</td>
			<td>{{ $s->created_at }}</td>
		</tr>
		<tr>
			<td>Outlet</td>
			<td>{{ $s->salesOutlet->address }}</td>
		</tr>
		<tr>
			<td>Sales</td>
			<td>{{ $s->sales->name }}</td>
		</tr>
	@foreach($s->paymentMethod as $pm)
		<tr>
			<td>Payment Method</td>
			<td>{{ $pm->name }}</td>
		</tr>
		<tr>
			<td>Payment Amount</td>
			<td>{{ 'Rp. ' . number_format($pm->pivot->payment_amount) }}</td>
		</tr>
	@endforeach
	</table>

	<table class="table" width="25%" border="0">
		<tr>
			<th>Product Name</th>
			<th>Quantity</th>
			<th>@Price</th>
			<th>Total Price</th>
			
		</tr>
		@foreach($s->product as $prd)
		<tr>
			<td>{{ $prd->name }}</td>
			<td>{{ $prd->pivot->quantity }}</td>
			<td>{{ 'Rp. ' . number_format($prd->selling_price) }}</td>
			<td>{{ 'Rp. ' . number_format($prd->pivot->quantity * $prd->selling_price) }}</td>
		</tr>
		@endforeach
		<tr>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>{{ 'Rp. ' . number_format($s->total_selling_price) }}</td>
		</tr>
	</table>
</form>

@endforeach
 
@endsection