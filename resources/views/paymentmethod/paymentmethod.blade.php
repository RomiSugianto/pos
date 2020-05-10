@extends('master')
 
@section('content')
 
	<style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
			margin:5px;
		}
	</style>

	<nav class="navbar navbar-light">
		<form class="form-inline" action="paymentmethod/search" method="GET">
		<input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ old('search') }}">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
	</nav>

	<table class="table">
		<tr>
			<th>PAYMENT METHOD ID</th>
			<th>NAME</th>
			<th>OPTION</th>
		</tr>
		@foreach($paymentmethod as $pm)
		<tr>
			<td>{{ $pm->id }}</td>
			<td>{{ $pm->name }}</td>
			<td>
				<a class="btn btn-warning btn-sm" href="{{url('paymentmethod/edit/'.$pm->id)}}">Edit</a>
				|
				<a class="btn btn-danger btn-sm" href="{{url('paymentmethod/delete/'.$pm->id)}}">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>

	<br/>
	Page : {{ $paymentmethod->currentPage() }} <br/>
	Total Data : {{ $paymentmethod->total() }} <br/>
	Data Per Page : {{ $paymentmethod->perPage() }} <br/>
 
 
	{{ $paymentmethod->links() }}
 
@endsection