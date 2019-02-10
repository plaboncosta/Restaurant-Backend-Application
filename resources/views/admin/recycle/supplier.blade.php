 <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <h2>Supplier Table</h2>
        <table class="table table-bordered">
          <thead class="table">
            <tr>
              <th>Id</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Address</th>
              <th scope="col">Created At</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($suppliers as $supplier)
            <tr>
              <td>{{$supplier->id}}</td>
            <td>{{$supplier->name}}</td>
            <td>{{$supplier->email}}</td>
            <td>{{$supplier->number}}</td>
            <td>{{$supplier->address}}</td>
            <td>{{$supplier->created_at}}</td>
            <td>
              <form id="form-delete-{{$supplier->id}}" action="{{url('/admin/recycle/supplier/delete/'.$supplier->id)}}" style="display:none;">
                @csrf
                method('delete')
              </form>
              <a href="{{url('/admin/recycle/supplier/delete/'.$supplier->id)}}" class="btn btn-danger" onclick="if(confirm('Are you sure to delete supplier?')){
                event.preventDefault();
                document.getElementById('form-delete-{{$supplier->id}}').submit();} else{
                event.preventDefault();
              }">Delete</a>
              <a href="{{url('/admin/recycle/supplier/restore/'.$supplier->id)}}" class="btn btn-primary">Restore</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>








