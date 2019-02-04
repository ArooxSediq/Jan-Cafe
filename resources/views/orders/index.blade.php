@extends('layout')


@section('title','JanCafe')

@section('content')

<div class="jumbotron">
	<h1 class="text-info">
		Our Orders
	</h1>
	<hr>

   @foreach($orders as $order)
		<li>
			<a class="text" href="/orders/{{ $order->id }}"> 
	    		{{ $order->customer_name }} | {{ $order->status }} 
	    	</a>
		</li>    	
    @endforeach
	
    <hr>
    <a href="orders/create" class="btn btn-info btn-md">Make a new order</a>
	
</div>


 

@endsection
