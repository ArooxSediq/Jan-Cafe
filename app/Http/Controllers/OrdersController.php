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
        $item = Items::findOrFail( request('item_id') );
        
        //Getting the Quanitiy & customer's name
        $qty = request('qty');
        $customer_name = request('customer_name');
        $total = $item->price * $qty;                              //Calculating the total
       
        // Checks if the order is already paid for or not
        if(request('paid') == null) $paid=0;
        else $paid = request('paid');

        //getting the first Order line object (if any)
        $first = Order_line::orderBy('id', 'desc')->first();
        
        //Checking whether our table is empty or has record 
        if($first == null)  $order_line = 1;
        else $order_line = $first->id + 1 ; 

        //Inserting the new order to the database
        Orders::create([
            "customer_name" => $customer_name,
            "total_price" => $total,
            "order_lines_id" => $order_line,
            "paid" => $paid
         ]);

        //Retrevieng the last order for the order ID
        $order_id = Orders::orderBy('id', 'desc')->first()->id;

        //Inserting the orderLine
        Order_line::create([
            'id' => $order_line,
            'order_id' => $order_id,
            'item_id' => $item->id,
            'price' => $total
        
        ]);

        // Returning back to the index page
        return redirect('orders');
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
