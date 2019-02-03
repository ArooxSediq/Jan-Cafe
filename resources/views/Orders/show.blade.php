@extends('layout')


@section('title','JanCafe')

@section('content')

<div class="jumbotron">
	<h1 class="text-info">
		Customer {{ $order->customer_name }}
	</h1>
	<hr>
		
		<li>

			<a class="text" href="/Orders/{{ $order->id }}"> 

	    		{{ $order->name }}
	    		|
	    		{{ $order->order_line->item_id }}
	    	</a>

	    	<span>

	    		{{-- {{ $order->price }} --}}
	    	</span>
		</li>    	

</div>


 

@endsection
