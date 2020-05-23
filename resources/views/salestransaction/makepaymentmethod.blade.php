@extends('master')
 
@section('content')
 
<div class="container">
	<h2 align="center">MAKE PAYMENT METHOD</h2>
	<h2 align="center">Total Transaction = Rp.{{ number_format($salestransaction->total_selling_price) }}</h2>
	<div class="form-group">  
		<form action={{ url('salestransaction/addpaymentmethod') }} method="post">
			{{ csrf_field() }}
			<div class="table-responsive">
				<table class="table table-bordered">  
					<tr>  
						<td>
							<select class="form-control" name="payment_method">
								<option value="" selected>select payment method</option>
							@foreach ($paymentmethod as $key => $pm)
								<option value="{{ $pm->id }}">{{ $pm->name }}</option>
							@endforeach
							</select>
						</td>
						<td><input type="number" name="payment_amount" placeholder="Payment Amount" min="0" step="any" max="999999999" class="form-control name_list" /></td>
						<td><input type="tel" name="card_number" placeholder="Card_number" class="form-control name_list" /></td>
						<td><input type="hidden" name="salestransaction" value="{{ $salestransaction->id }}" /></td>
					</tr>
				</table>  
				<input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
			</div>  
		</form>  
	</div>  
</div> 
 
@endsection