<?php

namespace App\Http\Controllers;

use App\Orders;
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
        // $Orders = "no orders currently";
    
        return view('Orders.index')->with([
            'Orders' => Orders::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         Orders::create([

            "name" => request('name'),
            "total_price" => request('total_price'),
            "description" => request('description'),
            "active" => '1'

                $table->increments('id');
            $table->string('customer_name');
            $table->decimal('total_price', 9, 2);
            $table->string('status')->default("pending");
            $table->unsignedInteger('order_lines_id')
            $table->boolean('paid');
            $table->boolean('posted');
            $table->timestamps();

         ]);
         return;
    }

    /**
     * Display the specified resource.
     *
     * @param  \Apview('welcome')p\Orders  $Orders
     * @return \Illuminate\Http\Response
     */
    // public function show(Orders $item)
    // {
    //     dd($item);
    // }

    public function show($id)
    {
        return Orders::findOrFail($id);
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
