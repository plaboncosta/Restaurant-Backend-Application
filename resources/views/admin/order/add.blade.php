	@extends('layouts.admin')
	@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Order Table</h1>
          <p>Table to display Order Data effectively.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item active"><a href="{{url('admin/order')}}">Order Table</a></li>
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
              <form action="{{url('admin/order/view')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="name">Name</label>
                  <select name="item_name" id="name" class="form-control">
                    @foreach($items as $item)
                      <option value="{{$item->item_id}}">{{$item->item_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="category">Category</label>
                  <select name="category_name" id="category" class="form-control">
                    @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" id="price" name="price" class="form-control">
                </div>
                <div class="form-group">
                  <label for="pays">Pays</label>
                  <select name="pay_name" id="pays" class="form-control">
                    @foreach($pays as $pay)
                      <option value="{{$pay->id}}">{{$pay->pay_name}}</option>
                    @endforeach
                  </select>
                </div>
                <a href="{{url('admin/order')}}" class="btn btn-danger">Back</a>
                <button type="submit" class="btn btn-primary">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection

   