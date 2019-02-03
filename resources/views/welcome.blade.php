@extends('layout')


@section('title','JanCafe')

@section('content')

<div class="container-fluid">
	
<div class="row">
        <div class="col-6 text-center">
            <br>
            <h2 class="text-info">Meta Solutions</h2>
            
        </div>
        <div class="col-6">
            <dir class="row">

                <dir class="row text-center" id="menu_list">
                    <div class="col-12">
                        <h2 class="text-info">Menu</h2>
                        <hr>
                        <ul class="list-group">
                        	@foreach($items as $item)
                        		<li class="list-group-item">{{ $item->name }} | {{$item->price}}</li>
                        	@endforeach
                        </ul>
                    </div>
                </dir>

                <dir class="row" id="orders_list">
                    <div class="col-12 text-center" >
                        <h2 class="text-info">Orders</h2>
                        <hr>
                        <ul class="list-group hover">
                        	@foreach($orders as $order)
                        		@if($order->status == 'pending')
                        			<li 
                        			class="progress-bar-striped bg-info text-white">
                        				{{ $order->customer_name }} | {{ $order->Order_line->item_id }}
                        			</li>
                        		@else
                        			<li 
                        			class="progress-bar-striped progress-bar-animated bg-success text-white">
                        				{{$order->customer_name}}
                        			</li>
                        		@endif
                        	@endforeach
{{--                           <li class="progress-bar-striped progress-bar-animated bg-success text-white">Aroox Sediq | Black Coffee</li>
                          <li class="progress-bar-striped bg-info text-white">Mohammed | Espresso </li>
                          <li class="progress-bar-striped bg-info text-white">Brusk | Arabic Coffee</li>
                          <li class="progress-bar-striped bg-info text-white">Rawa | Hot Chocolate</li>
                          <li class="progress-bar-striped bg-dark text-muted">Srood | Arabic Coffee</li> --}}
                        </ul>
                    </div>
                </dir>

    

            </dir>
        </div>
</div>
</div>

@endsection
