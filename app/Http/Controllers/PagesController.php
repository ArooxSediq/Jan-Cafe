<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Items;
use App\Orders;

class PagesController extends Controller
{
    public function home()
    {
        $orders = Orders::all();
        $items  = Items::all();
    	return view('welcome')->with([
            'items' => $items,
            'orders' => $orders
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
