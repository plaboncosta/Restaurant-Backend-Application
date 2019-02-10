<div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <h2>Order Table</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Category</th>
              <th>Price</th>
              <th>Pays</th>
              <th>Created At</th>
              <th>Manage</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $data)
            <tr>
              <td>{{$data->id}}</td>
              <td>{{$data->item->item_name}}</td>
              <td>{{$data->category->category_name}}</td>
              <td>{{$data->price}}</td>
              <td>{{$data->pay->pay_name}}</td>
              <td>{{$data->created_at}}</td>
              <td>
                <form id="delete-form-{{$data->id}}" action="{{url('/admin/recycle/order/delete/'.$data->id)}}" style="display:none;">
                  @csrf
                  @method('delete')
                </form>
                <a href="{{url('/admin/recycle/order/delete/'.$data->id)}}" onclick="if(confirm('Are you sure to delete?')){
                  event.preventDefault();
                  document.getElementById('delete-form-{{$data->id}}').submit();} else{
                  event.preventDefault();
                }" class="btn btn-danger">Delete</a>
                <a href="{{url('/admin/recycle/order/restore/'.$data->id)}}" class="btn btn-primary">Restore</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>