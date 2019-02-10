<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class PaidController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	$orders = Order::where('pay_id', 1)->get();
    	return view('admin.order.paid.all', compact('orders'));
    }
}
