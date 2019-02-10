	@extends('layouts.admin')
	@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Category Table</h1>
          <p>Table to display Category Data effectively.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item active"><a href="{{url('admin/category')}}">Category Table</a></li>
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
              <a href="{{url('admin/category/add')}}" class="btn btn-info mb-2">Add New</a>
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Created At</th>
                    <th>Manage</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($category as $data)
                  <tr>
                    <td>{{$data->category_name}}</td>
                    <td>{{$data->category_slug}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>
                    	<a href="{{url('admin/category/show/'.$data->id)}}"><i class="fa fa-plus-square fa-lg"></i></a>
                    	<a href="{{url('admin/category/edit/'.$data->id)}}"><i class="fa fa-pencil-square fa-lg"></i></a>
                      <form id="delete-form-{{$data->id}}" action="{{url('admin/category/softdelete/'.$data->id)}}" style="display:none;">
                        @csrf
                        @method('delete')
                      </form>
                    	<a href="{{url('admin/category/softdelete/'.$data->id)}}"><i class="fa fa-trash fa-lg" onclick="if(confirm('Are you sure to delete?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{$data->id}}').submit();} else{
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

   