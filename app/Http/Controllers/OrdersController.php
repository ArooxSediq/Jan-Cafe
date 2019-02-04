<?php

namespace App\Http\Controllers;

use App\Order;
use App\Item;
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
        // $data = Order::all();
        return view('orders.index')->with([
            'orders' => Order::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create')->with([
            'items' => Item::all()
        ]);
    }

    /**
     * Store a newly created order in order's table.
     * @author Arukh Sediq
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        /*  Note: please try improving the code below if possible for production */
        //------------------------------------------------------------------------//


        //Finding the requested item for the order 
        $item = Item::findOrFail( request('item_id') );
        
        //Getting the Quanitiy & customer's name
        $qty = request('qty');
        $customer_name = request('customer_name');
        $total = $item->price * $qty;                              //Calculating the total
       
        // Checks if the order is already paid for or not
        if(request('paid') == null) $paid=0;
        else $paid = 1;

        //getting the first Order line object (if any)
        $first = Order_line::orderBy('id', 'desc')->first();
        
        //Checking whether our table is empty or has record 
        if($first == null)  $order_line = 1;
        else $order_line = $first->id + 1 ; 

        //Inserting the new order to the database
        Order::create([
            "customer_name" => $customer_name,
            "price" => $item->price,
            "order_lines_id" => $order_line,
            "paid" => $paid
         ]);

        //Retrevieng the last order for the order ID
        $order_id = Order::orderBy('id', 'desc')->first()->id;

        //Inserting the orderLine
        Order_line::create([
            'id' => $order_line,
            'order_id' => $order_id,
            'item_id' => $item->id,
            'price' => $total,
            'qty' => $qty
        ]);

        // Returning back to the index page
        return redirect('orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Apview('welcome')p\Order  $Order
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        return view('orders.show')->with([
             'order' => Order::findOrFail($id) 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $Order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $Order)
    {
        return view('orders.edit');        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $Order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $Order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $Order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $Order)
    {
        //
    }
}
