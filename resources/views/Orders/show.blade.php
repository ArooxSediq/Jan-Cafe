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
	  <li class="list-group-item">Total: {{ $order->total_price }} </li>
	  <li class="list-group-item">Status: {{ $order->status }} </li>
	  <li class="list-group-item">Paid: {{ $order->paid }} </li>
	</ul>

	@dd($order->order_line)
	<ul class="list-group">
	  <li class="list-group-item">Customer: {{ $order->customer_name }} </li>
	  <li class="list-group-item">Total: {{ $order->total_price }} </li>
	  <li class="list-group-item">Status: {{ $order->status }} </li>
	  <li class="list-group-item">Paid: {{ $order->paid }} </li>
	</ul>
</div>


 

@endsection
