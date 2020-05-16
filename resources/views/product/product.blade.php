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
		<form class="form-inline" action="product/search" method="GET">
		<input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ old('search') }}">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
		<a class="btn btn-danger btn-sm" href="{{ url('product/new') }}">+</a>
	</nav>

	<table class="table">
		<tr>
			<th>PRODUCT ID</th>
			<th>NAME</th>
			<th>BUYING PRICE</th>
			<th>SELLING PRICE</th>
			<th>OPTION</th>
		</tr>
		@foreach($product as $p)
		<tr>
			<td>{{ $p->id }}</td>
			<td>{{ $p->name }}</td>
			<td>Rp {{number_format($p->buying_price,2,',','.') }}</td>
			<td>Rp {{number_format($p->selling_price,2,',','.') }}</td>
			<td>
				<a class="btn btn-warning btn-sm" href="{{url('product/edit/'.$p->id)}}">Edit</a>
				|
				<a class="btn btn-danger btn-sm" href="{{url('product/delete/'.$p->id)}}">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>

	<br/>
	Page : {{ $product->currentPage() }} <br/>
	Total Data : {{ $product->total() }} <br/>
	Data Per Page : {{ $product->perPage() }} <br/>
 
 
	{{ $product->links() }}
 
@endsection