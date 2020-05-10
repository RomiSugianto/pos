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
	</nav>

	<table class="table">
		<tr>
			<th>OUTLET ID</th>
			<th>ADDRESS</th>
			<th>PHONE NUMBER</th>
			<th>OPTION</th>
		</tr>
		@foreach($salesoutlet as $o)
		<tr>
			<td>{{ $o->id }}</td>
			<td>{{ $o->address }}</td>
			<td>{{ $o->phone_number }}</td>
			<td>
				<a class="btn btn-warning btn-sm" href="{{url('salesoutlet/edit/'.$o->id)}}">Edit</a>
				|
				<a class="btn btn-danger btn-sm" href="{{url('salesoutlet/delete/'.$o->id)}}">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>

	<br/>
	Page : {{ $salesoutlet->currentPage() }} <br/>
	Total Data : {{ $salesoutlet->total() }} <br/>
	Data Per Page : {{ $salesoutlet->perPage() }} <br/>
 
 
	{{ $salesoutlet->links() }}
 
@endsection