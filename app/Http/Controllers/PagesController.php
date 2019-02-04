<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Order;

class PagesController extends Controller
{
    public function home()
    {
        $Order = Order::all();
        $Item  = Item::all();
    	
        return view('welcome')->with([
            'items' => $Item,
            'orders' => $Order
        ]);
    }

    // public function waiter()
    // {
    // 	return view('waiter');
    // }

    // public function admin()
    // {
    // 	return view('admin');
    // }
}
