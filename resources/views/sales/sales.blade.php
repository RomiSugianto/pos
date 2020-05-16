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
		<form class="form-inline" action="sales/search" method="GET">
		  <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ old('search') }}">
		  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
		<a class="btn btn-danger btn-sm" href="{{ url('sales/new') }}">+</a>
	</nav>

	<table class="table">
		<tr>
			<th>SALES ID</th>
			<th>SALES NAME</th>
			<th>PHONE</th>
			<th>OPTION</th>
		</tr>
		@foreach($sales as $s)
		<tr>
			<td>{{ $s->id }}</td>
			<td>{{ $s->name }}</td>
			<td>{{ $s->phone_number }}</td>
			<td>
				<a class="btn btn-warning btn-sm" href="sales/edit/{{ $s->id }}">Edit</a>
				|
				<a class="btn btn-danger btn-sm" href="sales/delete/{{ $s->id }}">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>

	<br/>
	Page : {{ $sales->currentPage() }} <br/>
	Total Data : {{ $sales->total() }} <br/>
	Data Per Page : {{ $sales->perPage() }} <br/>
 
 
	{{ $sales->links() }}
 
@endsection