@extends('master')
 
@section('content')
 
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">{{ __('LOGIN') }}</div>

					<div class="card-body">
						<form action="{{ url('auth') }}" class="form" method="post">
							{{ csrf_field() }}
							<table class="table" width="25%" border="0">
								<tr>
									<td>Username</td>
									<td><input type="txt" name="username" placeholder="ID" required="required"/></td>
								</tr>
								<tr>
									<td>Password</td>
									<td><input type="password" name="password" placeholder="Password" required="required"/></td>
								</tr>
									<td></td>
									<td><button type="submit" name="Submit" class="btn btn-primary">login</button></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
 
@endsection