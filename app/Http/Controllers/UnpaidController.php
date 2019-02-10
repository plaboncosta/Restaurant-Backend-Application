<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class UnpaidController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
        $orders = Order::where('pay_id', 2)->get();
        return view('admin.order.unpaid.all', compact('orders'));
    }
}
