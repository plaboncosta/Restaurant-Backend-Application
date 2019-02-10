 <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <h2>User Table</h2>
        <table class="table table-bordered">
          <thead class="table">
            <tr>
              <th>Serial</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">User Role</th>
              <th scope="col">Time</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($myusers as $key=>$myuser)
            <tr>
              <td>{{$key+1}}</td>
            <td>{{$myuser->name}}</td>
            <td>{{$myuser->email}}</td>
            <td>{{$myuser->created_at}}</td>
            <td>{{$myuser->roleName->role_name}}</td>
            <td>
              <form id="form-delete-{{$myuser->id}}" action="{{url('/admin/recycle/user/delete/'.$myuser->id)}}" style="display:none;">
                @csrf
                method('delete')
              </form>
              <a href="{{url('/admin/recycle/user/delete/'.$myuser->id)}}" class="btn btn-danger" onclick="if(confirm('Are you sure to delete user?')){
                event.preventDefault();
                document.getElementById('form-delete-{{$myuser->id}}').submit();} else{
                event.preventDefault();
              }">Delete</a>
              <a href="{{url('/admin/recycle/user/restore/'.$myuser->id)}}" class="btn btn-primary">Restore</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>








