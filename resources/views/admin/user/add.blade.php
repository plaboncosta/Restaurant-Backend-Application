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
          <li class="breadcrumb-item active"><a href="{{url('admin/user')}}">User Table</a></li>
        </ul>
      </div>
      @if(session('success'))
        <h2></h2>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <h2>{{session('success')}}</h2>
        </div>
      @endif
      @if ($errors->any())
      @foreach ($errors->all() as $error)
      <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ $error }}</strong>
      </div>
      @endforeach
      @endif
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="tile">
            <div class="tile-body">
              <form action="{{url('/admin/user/view')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" id="name" name="name" class="form-control">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                  <label for="role_name">Role Name</label>
                  <select name="role_name" id="role_name" class="form-control">
                    @foreach($usersrole as $usrole)
                      <option value="{{$usrole->role_id}}">{{$usrole->role_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                  <label for="confirm_password">Confirm Password</label>
                  <input type="password" id="confirm_password" name="confirm_password" class="form-control">
                </div>
                <a href="{{url('admin/user')}}" class="btn btn-danger">Back</a>
                <button type="submit" class="btn btn-primary">Save</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-2"></div>
      </div>
    </main>
@endsection

   