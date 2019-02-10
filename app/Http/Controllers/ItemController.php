<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	$items = Item::where('item_status', 1)->get();
    	return view('admin.item.all', compact('items'));
    }


    // Item Add Code
    public function add(){
    	$categories = Category::all();
    	return view('admin.item.add', compact('categories'));
    }

    public function view(Request $request){
    	$this->validate($request, [
            'category_name' => 'required',
            'item_name' => 'required',
            'item_description' => 'required',
            'item_price' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->item_name);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
        
            if(!file_exists('uploads/item')){
                mkdir('uploads/item', 0777, true);
            }

            $image->move('uploads/item', $imagename);
        }
        else{
            $imagename = 'default.png';
        }


        $item = new Item();
        $item->category_id = $request->category_name;
        $item->item_name = $request->item_name;
        $item->item_description = $request->item_description;
        $item->item_price = $request->item_price;
        $item->image = $imagename;
        $item->save();

        return redirect()->action('ItemController@index')->with('success', 'Item Added Successfully');

    }




    // Item Show Code
    /*public function show($id){
        $item_show = Item::find($id);
        return view('admin.item.view', compact('item_show'));
    }*/




    // Item Edit Code
    public function edit($id){
        $item_edit = Item::find($id);
        $categories = Category::all();
        return view('admin.item.edit', compact('item_edit', 'categories'));
    }


    public function update(Request $request, $id){

        $item = Item::find($id);

        $this->validate($request,[
            'category_name' => 'required',
            'item_name' => 'required',
            'item_description' => 'required',
            'item_price' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->item_name);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if(!file_exists('uploads/item')){
                mkdir('uploads/item', 0777, true);
            }
            unlink('uploads/item/'.$item->image);
            $image->move('uploads/item', $imagename);
        }
        else{
            $imagename = $item->image;
        }


        $item->category_id = $request->category_name;
        $item->item_name = $request->item_name;
        $item->item_description = $request->item_description;
        $item->item_price = $request->item_price;
        $item->image = $imagename;
        $item->save();

        return redirect()->action('ItemController@index')->with('success', 'Item Updated Successfully');

    }






    // Item Delete Code
    public function soft_delete($id){
    	$softdel = Item::where('item_status', 1)->where('item_id', $id)
    			   ->update(['item_status'=>0,]);
    	if($softdel){
    		return redirect()->back()->with('success', 'Item Deleted Successfully');
    	}
    	else{
    		return redirect()->back();
    	}

    }
}
