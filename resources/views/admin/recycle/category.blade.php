<div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <h2>Category Table</h2>
        <table class="table table-bordered">
          <thead class="table">
            <tr>
              <th>Serial</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Created At</th>
              <th>Manage</th>
            </tr>
          </thead>
          <tbody>
            @foreach($mycategory as $key=>$data)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$data->category_name}}</td>
              <td>{{$data->category_slug}}</td>
              <td>{{$data->created_at}}</td>
              <td>
                <form id="delete-form-{{$data->id}}" action="{{url('/admin/recycle/category/delete/'.$data->id)}}" style="display:none;">
                  @csrf
                  @method('delete')
                </form>
                <a href="{{url('/admin/recycle/category/delete/'.$data->id)}}" onclick="if(confirm('Are you sure to delete?')){
                  event.preventDefault();
                  document.getElementById('delete-form-{{$data->id}}').submit();} else{
                  event.preventDefault();
                }" class="btn btn-danger">Delete</a>
                <a href="{{url('/admin/recycle/category/restore/'.$data->id)}}" class="btn btn-primary">Restore</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>