<!DOCTYPE html>
<html>
<head>
    <title>Jan-Cafe TV</title>

    <link 
        rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" 
        crossorigin="anonymous">
</head>
<body>

<div class="container-fluid">
    
<div class="row">
        <div class="col-6 text-center">
            <br>
            <h2 class="text-info">Meta Solutions</h2>
            
        </div>
        <div class="col-6">

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
                                       {{ $order->id }} | {{ $order->customer_name }} 

                                    </li>
                                @else
                                    <li 
                                    class="progress-bar-striped progress-bar-animated bg-success text-white">
                                        {{ $order->id }} | {{$order->customer_name}}
                                    </li>
                                @endif
                            @endforeach

                        </ul>
                    </div>
                </dir>


        </div>
</div>
</div>


</body>
</html>
