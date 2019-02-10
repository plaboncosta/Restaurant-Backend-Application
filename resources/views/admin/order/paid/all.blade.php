	@extends('layouts.admin')
	@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Order Paid Table</h1>
          <p>Table to display Order Paid Data effectively.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item active"><a href="{{url('admin/order/paid')}}">Order Paid Table</a></li>
        </ul>
      </div>
      @if(session('success'))
        <h2></h2>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <h2>{{session('success')}}</h2>
        </div>
      @endif
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <a href="{{url('admin/order')}}" class="btn btn-info mb-2">All Order</a>
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Pays</th>
                    <th>Created At</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orders as $data)
                  <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->item->item_name}}</td>
                    <td>{{$data->category->category_name}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->pay->pay_name}}</td>
                    <td>{{$data->created_at}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection

   