@extends('layouts.admin')
	@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Supplier Table</h1>
          <p>Table to display analytical data effectively</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item active"><a href="{{url('admin/supplier')}}">Supplier Table</a></li>
        </ul>
      </div>
      @if ($errors->any())
        @foreach ($errors->all() as $error)
          <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ $error }}</strong>
          </div>
        @endforeach
      @endif
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <form action="{{url('admin/supplier/view')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" id="name" name="name" class="form-control">
                </div>
                <div class="form-group">
                  <label for="phone">Phone <span>(11 digit)</span></label>
                  <input type="number" id="phone" name="number" class="form-control">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" id="address" name="address" class="form-control">
                </div>
                <div class="form-group">
                  <label>Date</label>
                  <input type="text" id="datetimepicker" name="date" class="form-control">
                </div>
                <a href="{{url('admin/supplier')}}" class="btn btn-danger">Back</a>
                <button type="submit" class="btn btn-info">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection

   