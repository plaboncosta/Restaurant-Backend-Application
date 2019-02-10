@extends('layouts.admin')
	@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Category Table</h1>
          <p>Table to display analytical data effectively</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item active"><a href="{{url('admin/category')}}">All Category</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="tile">
            <div class="row">
              <div class="col-md-6">
                  <h3 class="">View User Information</h3>
              </div>
              <div class="col-md-6 text-right">
                <a href="{{url('/admin/category')}}" class="btn btn-info mb-3">All Category</a>
              </div>
            </div>
            <div class="tile-body">
              <table class="table table-bordered">
                <tr>
                  <td>Category Name</td>
                  <td>:</td>
                  <td>{{$category_show->category_name}}</td>
                </tr>
                <tr>
                  <td>Slug</td>
                  <td>:</td>
                  <td>{{$category_show->category_slug}}</td>
                </tr>
                <tr>
                  <td>Creation Time</td>
                  <td>:</td>
                  <td>{{$category_show->created_at}}</td>
                </tr>
              </table>
              <!-- <a href="" class="btn btn-info mt-2"><i class="fa fa-download mr-2"></i>PDF</a> -->
            </div>
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>
    </main>
@endsection

   