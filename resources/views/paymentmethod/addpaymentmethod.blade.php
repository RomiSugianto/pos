@extends('master')
 
@section('content')
 
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">{{ __('NEW PAYMENT METHOD') }}</div>

					<div class="card-body">
						<form action="./add" class="form" method="post">
							{{ csrf_field() }}
							<table class="table" width="25%" border="0">
								<tr>
									<td>Payment ID</td>
									<td><input type="text" name="id" placeholder="ID" required="required"/></td>
								</tr>
								<tr>
									<td>Name</td>
									<td><input type="text" name="name" placeholder="Name" required="required"/></td>
								</tr>
									<td></td>
									<td><button type="submit" name="Submit" class="btn btn-primary">Add</button></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
 
@endsection