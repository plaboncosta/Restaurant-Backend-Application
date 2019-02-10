<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Order;
use App\Supplier;
use App\User;
use Illuminate\Http\Request;

class RecycleController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    	$this->middleware('superadmin');
    }


    public function index(){
    	$myusers = User::where('status', 0)->get();
    	$mycategory = Category::where('category_status', 0)->get();
    	$myitem = Item::where('item_status', 0)->get();
        $orders = Order::where('status', 0)->get();
        $suppliers = Supplier::where('status', 0)->get();
    	return view('admin.recycle.all', compact('myusers', 'mycategory', 'myitem', 'orders', 'suppliers'));
    }



    // User Delete
    public function user_delete($id){
    	User::find($id)->delete();
    	return redirect()->back()->with('success', 'User Delete Successfully');
    }


    //User Restore
    public function user_restore($id){
    	$user_restore = User::where('status', 0)->where('id', $id)->update([
    		'status'=>1,
    	]);
    	if($user_restore){
    		return redirect()->back()->with('success','User Restored Successfully');
    	}
    	else{
    		return redirect()->back();
    	}
    }





    // Category Delete
    public function category_delete($id){
    	Category::find($id)->delete();
    	return redirect()->back()->with('success', 'Category deleted Successfully');
    }

    // Category Restore
    public function category_restore($id){
    	$category_restore = Category::where('category_status', 0)->where('id', $id)->update([
    		'category_status' => 1,
    	]);
    	if($category_restore){
    		return redirect()->back()->with('success', 'Category Restored Successfully');
    	}
    	else{
    		return redirect()->back();
    	}
    }









// Item Delete
    public function item_delete($id){
    	$item = Item::find($id);
    	if(file_exists('uploads/item/'.$item->image)){
    		unlink('uploads/item/'.$item->image);
    	}
    	$item->delete();
    	return redirect()->back()->with('success', 'Item deleted Successfully');
    }

    // Item Restore
    public function item_restore($id){
    	$item_restore = Item::where('item_status', 0)->where('item_id', $id)->update([
    		'item_status' => 1,
    	]);
    	if($item_restore){
    		return redirect()->back()->with('success', 'Item Restored Successfully');
    	}
    	else{
    		return redirect()->back();
    	}
    }







// Order Delete Code
    public function order_delete($id){
        $order_del = Order::where('status', 0)->where('id', $id)->delete();
        if($order_del){
            return redirect('admin/recycle')->with('success', 'Order Deleted Successfully');
        }
        else{
            return redirect()->back();
        }
    }


// Order Restore Code
    public function order_restore($id){
        $order_restore = Order::where('status', 0)->where('id', $id)->update([
            'status' => 1,
        ]);
        if($order_restore){
            return redirect('admin/recycle')->with('success', 'Order Restored Successfully');
        }
        else{
            return redirect()->back();
        }
    }






// Supplier Delete
    public function supplier_delete($id){
        $del = Supplier::where('status', 0)->where('id', $id)->delete();
        if($del){
            return redirect()->back()->with('success', 'Supplier Deleted Successfully');
        }
        else{
            return redirect()->back();
        }
    }



// Supplier Restore 
    public function supplier_restore($id){
        $restore = Supplier::where('status', 0)->where('id', $id)->update([
            'status' => 1,
        ]);
        if($restore){
            return redirect()->back()->with('success', 'Supplier Restored Successfully');
        }
        else{
            return redirect()->back();
        }
    }



}
