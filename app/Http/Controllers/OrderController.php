<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Order;
use App\Pay;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }


    public function index(){
    	$orders = Order::where('status', 1)->get(); 
    	return view('admin.order.all', compact('orders'));
    }




// Order Add Code
    public function add(){
    	$items = Item::all();
    	$categories = Category::all();
    	$pays = Pay::all();
    	return view('admin.order.add', compact('items', 'categories', 'pays'));
    }



    public function view(Request $request){
    	$this->validate($request, [
    		'item_name' => 'required',
    		'category_name' => 'required',
    		'price' => 'required',
    		'pay_name' => 'required',
    	]);

    	$order = new Order();
    	$order->item_id = $request->item_name;
    	$order->category_id = $request->category_name;
    	$order->pay_id = $request->pay_name;
    	$order->price = $request->price;
    	$order->save();

    	return redirect('admin/order')->with('success', 'Order Added Successfully');
    }








// Order Edit Code
    public function edit($id){
    	$items = Item::all();
    	$categories = Category::all();
    	$pays = Pay::all();
    	$order = Order::find($id);
    	return view('admin.order.edit', compact('items', 'categories', 'pays', 'order'));
    }


    public function update(Request $request, $id){
    	$this->validate($request, [
    		'item_name' => 'required',
    		'category_name' => 'required',
    		'price' => 'required',
    		'pay_name' => 'required',
    	]);

    	$order = Order::find($id);
    	$order->item_id = $request->item_name;
    	$order->category_id = $request->category_name;
    	$order->pay_id = $request->pay_name;
    	$order->price = $request->price;
    	$order->save();

    	return redirect('admin/order')->with('success', 'Order Updated Successfully');
    }





    // Order SoftDelete Code
    public function softdelete($id){
    	$soft_del = Order::where('status', 1)->where('id', $id)->update([
    		'status' => 0,
    	]);

    	if($soft_del){
    		return redirect('admin/order')->with('success', 'Order deleted Successfully');
    	}
    	else{
    		return redirect('admin/order');
    	}
    }




}
