<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ItemPdfController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function show($id){
    	$item_show = $this->get_item_data($id);
    	return view('admin.item.view', compact('item_show'));
    }


    public function get_item_data($id){
    	$item_show = Item::find($id);
    	return $item_show;
    }


    public function pdf($id){
    	$pdf = App::make('dompdf.wrapper');
    	$pdf->loadHTML($this->convert_item_data_to_html($id));
    	return $pdf->download('item.pdf');
    }


    public function convert_item_data_to_html($id){
    	$item_show = $this->get_item_data($id);
    	$ouput = '
    	<link href="contents/admin/css/bootstrap.min.css" rel="stylesheet" />
			<table class="table table-bordered">
			  <tr>
			    <td>Item Name</td>
			    <td>:</td>
			    <td>'.$item_show->item_name.'</td>
			  </tr>
			  <tr>
			    <td>Image</td>
			    <td>:</td>
			    <td><img src="uploads/item/'.$item_show->image.'" alt="Category Image" style="width:130px; height:90px;"></td>
			  </tr>
			  <tr>
			    <td>Category</td>
			    <td>:</td>
			    <td>'.$item_show->category->category_name.'</td>
			  </tr>
			  <tr>
			    <td>Description</td>
			    <td>:</td>
			    <td>'.$item_show->item_description.'</td>
			  </tr>
			  <tr>
			    <td>Price</td>
			    <td>:</td>
			    <td>'.$item_show->item_price.'</td>
			  </tr>
			  <tr>
			    <td>Creation Time</td>
			    <td>:</td>
			    <td>'.$item_show->created_at.'</td>
			  </tr>
			</table>
    	';

    	return $ouput;
    }






}
