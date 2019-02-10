<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class OrderPdfController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }


    public function show($id){
    	$order_show = $this->get_order_data($id);
    	return view('admin.order.view', compact('order_show')); 
    }


    public function get_order_data($id){
    	$order_data = Order::find($id);
    	return $order_data;
    }






    public function pdf($id){
    	$pdf = App::make('dompdf.wrapper');
    	$pdf->loadHTML($this->convert_order_data_to_html($id));
    	return $pdf->download('order.pdf');
    }



    public function convert_order_data_to_html($id){
    	$order_show = $this->get_order_data($id);
    	$output = '
    	<link href="contents/admin/css/bootstrap.min.css" rel="stylesheet" />
			<table class="table table-bordered">
			  <tr>
			    <td>Name</td>
			    <td>:</td>
			    <td>'.$order_show->item->item_name.'</td>
			  </tr>
			  <tr>
			    <td>Category</td>
			    <td>:</td>
			    <td>'.$order_show->category->category_name.'</td>
			  </tr>
			  <tr>
			    <td>Price</td>
			    <td>:</td>
			    <td>'.$order_show->price.'</td>
			  </tr>
			  <tr>
			    <td>Pays</td>
			    <td>:</td>
			    <td>'.$order_show->pay->pay_name.'</td>
			  </tr>
			  <tr>
			    <td>Creation Time</td>
			    <td>:</td>
			    <td>'.$order_show->created_at.'</td>
			  </tr>
			</table>
    	';

    	return $output;
    }







}
