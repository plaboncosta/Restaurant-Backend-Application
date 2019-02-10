@extends('layouts.admin')
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Item Table</h1>
      <p>Table to display Item Edit Data effectively.</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item active"><a href="{{url('admin/category')}}">Item Table</a></li>
      <li class="breadcrumb-item active"><a href="#">Item Add Table</a></li>
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
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="tile">
        <div class="tile-body">
          <form action="{{url('/admin/item/update/'.$item_edit->item_id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
              <label for="category_name">Category Name</label>
              <select name="category_name" id="category_name" class="form-control">
                @foreach($categories as $category)
                  <option value="{{$category->id}}" {{$category->id == $item_edit->category->id ? 'selected' : ''}}>{{$category->category_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="item_name">Item Name</label>
              <input class="form-control" id="item_name" type="text" name="item_name" value="{{$item_edit->item_name}}">
            </div>
            <div class="form-group">
              <label for="item_description">Item Description</label>
              <textarea class="form-control" name="item_description" id="item_description" cols="30" rows="5">{{$item_edit->item_description}}</textarea>
            </div>
            <div class="form-group">
              <label for="item_price">Item Price</label>
              <input class="form-control" id="item_price" type="number" name="item_price"  value="{{$item_edit->item_price}}">
            </div>
            <div class="form-group">
              <label for="image">Item Image</label>
              <input class="form-control" id="image" type="file" name="image">
            </div>
            <a href="{{url('admin/item')}}" class="btn btn-danger mr-1">Back</a>
            <button type='submit' class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
    <div class="col-md-1"></div>
    </div>
  </div>
</main>
@endsection