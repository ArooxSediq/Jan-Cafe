@extends('layout')


@section('title','JanCafe')

@section('content')

<div class="jumbotron">
	<h1 class="text-info">
		Invoice View
	</h1>
	<hr>
	<ul class="list-group">
	  <li class="list-group-item">Customer: {{ $order->customer_name }} </li>
	  <li class="list-group-item">Price: {{ $order->price }} </li>
	  <li class="list-group-item">Status: {{ $order->status }} </li>
	  <li class="list-group-item">Paid: {{ $order->paid }} </li>
	</ul>
 	
	<ul class="list-group">
		@foreach($order->order_lines as $value)
		  <li class="list-group-item">Quantity: {{ $value->qty }} </li>
		  <li class="list-group-item">Total Price: {{ $value->price }} </li>
		  @if($value->paid == 1) 
		  	<li class="list-group-item">Paid</li>
		  @else
		  	<li class="list-group-item">Unpaid</li>
		  @endif
		@endforeach
	 
	</ul>
</div>


 

@endsection
