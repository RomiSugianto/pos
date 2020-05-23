@extends('master')
 
@section('content')
 
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">{{ __('Select Outlet') }}</div>

					<div class="card-body">
						<form action="{{ url('selectoutlet') }}" class="form" method="post">
							{{ csrf_field() }}
							<table class="table" width="25%" border="0">
								<tr>
									<select class="form-control" name="outlet">
										<option value="" selected>Select Outlet</option>
									@foreach ($list_outlet as $key => $outlet)
										<option value="{{ $outlet->id }}">{{ $outlet->address }}</option>
									@endforeach
									</select>
								</tr>
								<tr>
									<td></td>
									<td><button type="submit" name="Submit" class="btn btn-primary">Select</button></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
 
@endsection