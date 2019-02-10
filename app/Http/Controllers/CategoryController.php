<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	$category = Category::where('category_status', 1)->get();
    	return view('admin.category.all', compact('category'));
    }



// Category add Code
    public function add(){
    	return view('admin.category.add');
    }

    public function view(Request $request){
    	$this->validate($request,[
    	    'category_name' => 'required|max:30',
    	],[
    		'category_name.required' => 'Category Name is Required',
    	]);

    	$category = new Category();
    	$category->category_name = $request->category_name;
    	$category->category_slug = str_slug($request->category_slug);
    	$category->save();
    	return redirect()->action('CategoryController@index')->with('success', 'Category Successfully Added');
    }



// Category Show Code
    public function show($id){
        $category_show = Category::find($id);
        return view('admin.category.view', compact('category_show'));
    }



// Category edit Code
    public function edit($id){
    	$category_edit = Category::find($id);
    	return view('admin.category.edit',compact('category_edit'));
    }

    public function update(Request $request, $id){
    	$this->validate($request, [
    		'category_name' => 'required|max:30',
    	],[
    		'category_name.required' => 'Name Field is required',
    	]);

    	$category = Category::find($id);
    	$category->category_name = $request->category_name;
    	$category->category_slug = str_slug($request->category_slug);
    	$category->save();
    	return redirect()->action('CategoryController@index')->with('success', 'Category Updated Successfully');
    }



// Category soft-delete Code
    public function soft_delete($id){
    	$softdel = Category::where('category_status', 1)->where('id', $id)->update([
    		'category_status'=>0,
    	]);
    	if($softdel){
    		return redirect('admin/category')->with('success', 'Category Deleted Successfully');
    	}
    	else{
    		return redirect('admin/category');
    	}

    }










    
}
