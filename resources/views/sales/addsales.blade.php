@extends('master')

@section('content')

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">{{ __('NEW SALES') }}</div>

					<div class="card-body">
						<form action="./add" class="form" method="post">
							{{ csrf_field() }}
							<table class="table" width="25%" border="0">
								<tr>
									<td>Sales ID</td>
									<td><input type="text" name="id" placeholder="ID" required="required"/></td>
								</tr>
								<tr>
									<td>Name</td>
									<td><input type="text" name="name" placeholder="Name" required="required"/></td>
								</tr>
								<tr>
									<td>Phone Number</td>
									<td><input type="tel" id="phone" name="phone_number" placeholder="0123456789" pattern="[0-9]{11,15}" required="required"/></td>
								</tr>
                                <tr>
                                    <td>Username</td>
                                    <td><input type="text" name="username" placeholder="Username" required="required"/></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input type="password" name="password" placeholder="Password" required="required"/></td>
                                </tr>
								<tr>
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
