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

			<a class="text" href="/Orders/{{ $order->id }}"> 

	    		{{ $order->name }}
	    	</a>

	    	<span>

	    		{{-- {{ $order->price }} --}}
	    	</span>
		</li>    	
    @endforeach
	
</div>


 

@endsection
