<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SupplierPdfcontroller extends Controller
{

	public function __construct(){
		$this->middleware('auth');
	}

    public function show($id){
    	$supplier = $this->supplier_data($id);
    	return view('admin.supplier.view', compact('supplier'));
    }



    public function supplier_data($id){
    	$supplier = Supplier::find($id);
    	return $supplier;
    }


    public function pdf($id){
    	$pdf = App::make('dompdf.wrapper');
		$pdf->loadHTML($this->convert_supplier_data_to_html($id));
		return $pdf->download('supplier.pdf');
    }



    public function convert_supplier_data_to_html($id){
    	$supplier = $this->supplier_data($id);
  		$output = '
  		<link href="contents/admin/css/bootstrap.min.css" rel="stylesheet" />
  		<h3 class="text-center">Supplier Information ('.$supplier->name.')</h3>
			<table class="table table-bordered">
                <tr>
                  <td>Name</td>
                  <td>:</td>
                  <td>'.$supplier->name.'</td>
                </tr>
                <tr>
                  <td>Phone</td>
                  <td>:</td>
                  <td>'.$supplier->number.'</td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td>:</td>
                  <td>'.$supplier->email.'</td>
                </tr>
                <tr>
                  <td>Address</td>
                  <td>:</td>
                  <td>'.$supplier->address.'</td>
                </tr>
                <tr>
                  <td>Creation Time</td>
                  <td>:</td>
                  <td>'.$supplier->created_at.'</td>
                </tr>
            </table>
  		';
  		return $output;
    }








}
