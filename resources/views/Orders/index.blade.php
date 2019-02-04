@extends('layout')


@section('title','JanCafe')

@section('content')

<div class="jumbotron">
	<h1 class="text-info">
		Our Orders
	</h1>
	<hr>

   @foreach($orders as $order)
	{{-- @dd($order->order_lines()) --}}
		<li>

			<a class="text" href="/Orders/{{ $order->id }}"> 

	    		{{ $order->customer_name }}
	    	</a>
		</li>    	
    @endforeach
	
</div>


 

@endsection
