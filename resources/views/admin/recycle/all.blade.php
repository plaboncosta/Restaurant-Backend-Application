@extends('layouts.admin')
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Data Table</h1>
      <p>Table to display analytical data effectively</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item active"><a href="{{url('admin/recycle')}}">User Table</a></li>
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
    @include('admin.recycle.user')
    @include('admin.recycle.category')
    @include('admin.recycle.item')
    @include('admin.recycle.order')
    @include('admin.recycle.supplier')
</div>
</main>
@endsection