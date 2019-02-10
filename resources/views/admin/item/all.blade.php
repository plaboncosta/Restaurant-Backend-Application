	@extends('layouts.admin')
	@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Item Table</h1>
          <p>Table to display Item Data effectively.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item active"><a href="{{url('admin/item')}}">Item Table</a></li>
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
              <a href="{{url('admin/item/add')}}" class="btn btn-info mb-2">Add New</a>
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Created At</th>
                    <th>Manage</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($items as $key=>$item)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->item_name}}</td>
                    <td><img class="img-fluid img-thumbnail" style="width:130px; height:90px;" src="{{asset('uploads/item/'.$item->image)}}" alt=""></td>
                    <td>{{$item->category->category_name}}</td>
                    <td>{{$item->item_description}}</td>
                    <td>{{$item->item_price}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>
                    	<a href="{{url('admin/item/show/'.$item->item_id)}}"><i class="fa fa-plus-square fa-lg"></i></a>
                    	<a href="{{url('admin/item/edit/'.$item->item_id)}}"><i class="fa fa-pencil-square fa-lg"></i></a>
                      <form id="delete-form-{{$item->item_id}}" action="{{url('admin/item/softdelete/'.$item->item_id)}}" style="display:none;">
                        @csrf
                        @method('delete')
                      </form>
                    	<a href="{{url('admin/category/softdelete/'.$item->item_id)}}"><i class="fa fa-trash fa-lg" onclick="if(confirm('Are you sure to delete?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{$item->item_id}}').submit();} else{
                          event.preventDefault();
                        }"></i></a>
                    </td>
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

   