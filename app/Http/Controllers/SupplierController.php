<?php

namespace App\Http\Controllers;

use App\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }


    public function index(){
    	$suppliers = Supplier::where('status', 1)->get();
    	return view('admin.supplier.all', compact('suppliers'));
    }




// Supplier Add Code
    public function add(){
    	return view('admin.supplier.add');
    }

    public function view(Request $request){
    	$this->validate($request, [
    		'name' => 'required|string|max:35',
    		'email' => 'required|email',
    		'number' => 'required|min:11|numeric',
            'address' => 'required',
    		'date' => 'required',
    	]);

    	$supplier = new Supplier();
    	$supplier->name = $request->name;
    	$supplier->email = $request->email;
    	$supplier->number = $request->number;
    	$supplier->address = $request->address;
        $supplier->date = $request->date;
    	$supplier->save();

    	return redirect('admin/supplier')->with('success', 'Supplier Added Successfully');
    }




// Supplier Edit
    public function edit($id){
    	$supplier = Supplier::find($id);
    	return view('admin.supplier.edit', compact('supplier'));
    }


    public function update(Request $request, $id){
    	$this->validate($request, [
    		'name' => 'required|string|max:35',
    		'email' => 'required|email',
    		'number' => 'required|min:11|numeric',
    		'address' => 'required',
            'date' => 'required',
    	]);

    	$supplier = Supplier::find($id);
    	$supplier->name = $request->name;
    	$supplier->email = $request->email;
    	$supplier->number = $request->number;
    	$supplier->address = $request->address;
        $supplier->date = $request->date;
    	$supplier->save();

    	return redirect('admin/supplier')->with('success', 'Supplier Updated Successfully');
    }






// Supplier Softdelete
    public function softdelete($id){
    	$soft_del = Supplier::where('status', 1)->where('id', $id)->update([
    		'status' => 0,
    	]);

    	if($soft_del){
    		return redirect()->back()->with('success', 'Supplier Deleted Successfully');
    	}
    	else{
    		return redirect()->back();
    	}
    }






}
