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
        // $Orders = "no orders currently";
    
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
         Orders::create([

            "name" => request('name'),
            "total_price" => request('total_price'),
            "description" => request('description'),

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
