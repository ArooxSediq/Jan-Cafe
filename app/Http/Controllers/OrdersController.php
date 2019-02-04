<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Items;
use App\Order_line;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $data = Orders::all();
        return view('Orders.index')->with([
            'orders' => Orders::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Orders.create')->with([
            'items' => Items::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Items::findOrFail( request('item_id') );
        
        $qty = request('qty');
        $customer_name = request('customer_name');

        $total = $item->price * $qty;
       
         
        if(request('paid') == null) $paid=0;
        else $paid = request('paid');

        $first = Order_line::orderBy('id', 'desc')->first();
        
        if($first == null)  $order_line = 1;
        else $order_line = $first->id + 1 ;

        Orders::create([
            "customer_name" => $customer_name,
            "total_price" => $total,
            "order_lines_id" => $order_line,
            "paid" => $paid
         ]);

        $order_id = Orders::orderBy('id', 'desc')->first()->id;

       Order_line::create([
            'id' => $order_line,
            'order_id' => $order_id,
            'item_id' => $$item->id,
            'price' => $total
        ]);

        

         return;
    }

    /**
     * Display the specified resource.
     *
     * @param  \Apview('welcome')p\Orders  $Orders
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        return view('Orders.show')->with([
             'order' => Orders::findOrFail($id) 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orders  $Orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $Orders)
    {
        return view('Orders.edit');        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orders  $Orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $Orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orders  $Orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $Orders)
    {
        //
    }
}
