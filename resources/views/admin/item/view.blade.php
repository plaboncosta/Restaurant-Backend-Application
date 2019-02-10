@extends('layouts.admin')
	@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Item Table</h1>
          <p>Table to display analytical data effectively</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item active"><a href="{{url('admin/item')}}">Item Table</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="tile">
            <div class="row">
              <div class="col-md-6">
                  <h3 class="">View Item Information</h3>
              </div>
              <div class="col-md-6 text-right">
                <a href="{{url('/admin/item')}}" class="btn btn-info mb-3">All Item</a>
              </div>
            </div>
            <div class="tile-body">
              <table class="table table-bordered">
                <tr>
                  <td>Item Name</td>
                  <td>:</td>
                  <td>{{$item_show->item_name}}</td>
                </tr>
                <tr>
                  <td>Image</td>
                  <td>:</td>
                  <td><img class="img-responsive img-thumbnail" src="{{asset('uploads/item/'.$item_show->image)}}" alt="Category Image" style="width:130px; height:90px;"></td>
                </tr>
                <tr>
                  <td>Category</td>
                  <td>:</td>
                  <td>{{$item_show->category->category_name}}</td>
                </tr>
                <tr>
                  <td>Description</td>
                  <td>:</td>
                  <td>{{$item_show->item_description}}</td>
                </tr>
                <tr>
                  <td>Price</td>
                  <td>:</td>
                  <td>{{$item_show->item_price}}</td>
                </tr>
                <tr>
                  <td>Creation Time</td>
                  <td>:</td>
                  <td>{{$item_show->created_at}}</td>
                </tr>
              </table>
              <a href="{{url('/admin/item/pdf/'.$item_show->item_id)}}" class="btn btn-info mt-2"><i class="fa fa-download mr-2"></i>PDF</a>
            </div>
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>
    </main>
@endsection

   