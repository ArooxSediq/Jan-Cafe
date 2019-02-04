<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       
        return view('items.index')->with([
            'items' => Item::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         Item::create([

            "name" => request('name'),
            "price" => request('price'),
            "description" => request('description'),
            "active" => '1'

         ]);

        return redirect('items');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Apview('welcome')p\Item  $Item
     * @return \Illuminate\Http\Response
     */
    // public function show(Item $item)
    // {
    //     dd($item);
    // }

    public function show($id)
    {
        return Item::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $Item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $Item)
    {
        return view('items.edit');        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $Item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $Item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $Item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $Item)
    {
        //
    }
}
