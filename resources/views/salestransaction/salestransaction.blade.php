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
		<form class="form-inline" action="salesoutlet/search" method="GET">
		<input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ old('search') }}">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
		<a class="btn btn-danger btn-sm" href="{{ url('salestransaction/new') }}">+</a>
	</nav>

	<table class="table">
		<tr>
			<th>TRANSACTION ID</th>
			<th>OUTLET</th>
			<th>SALES</th>
			<th>TRANSACTION DATE</th>
			<th>TOTAL SELLING PRICE</th>
			<th>OPTION</th>
		</tr>
		@foreach($salestransaction as $st)
		<tr>
			<td>{{ $st->id }}</td>
			<td>{{ $st->salesOutlet->address }}</td>
			<td>{{ $st->sales->name }}</td>
			<td>{{ $st->created_at }}</td>
			<td>{{ 'Rp. ' . number_format($st->total_selling_price) }}</td>
			<td>
				<a class="btn btn-warning btn-sm" href="{{ url('salestransaction/detail/'.$st->id) }}">View</a>
				|
				<a class="btn btn-danger btn-sm" href="{{ url('salestransaction/delete/'.$st->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>

	<br/>
	Page : {{ $salestransaction->currentPage() }} <br/>
	Total Data : {{ $salestransaction->total() }} <br/>
	Data Per Page : {{ $salestransaction->perPage() }} <br/>
 
 
	{{ $salestransaction->links() }}
 
@endsection