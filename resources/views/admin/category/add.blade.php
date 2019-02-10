@extends('layouts.admin')
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Category Add Table</h1>
      <p>Table to display Category Add Data effectively.</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item active"><a href="{{url('admin/category')}}">Category Table</a></li>
      <li class="breadcrumb-item active"><a href="#">Category Add Table</a></li>
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
          <form action="{{url('/admin/category/view')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input class="form-control" id="name" type="text" name="category_name" value="">
            </div>
            <div class="form-group">
              <label for="slug">Slug</label>
              <input class="form-control" id="slug" type="text" name="category_slug" value="">
            </div>
            <a href="{{url('admin/category')}}" class="btn btn-danger mr-1">Back</a>
            <button type='submit' class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
      <div class="col-md-1"></div>
    </div>
  </div>
</main>
@endsection