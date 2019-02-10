<div class="col-md-12">
  <div class="tile">
    <div class="tile-body">
      <h2>Item Table</h2>
      <table class="table table-bordered">
        <thead>
          <tr>
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
          @foreach($myitem as $item)
          <tr>
            <td>{{$item->item_name}}</td>
            <td><img class="img-fluid img-thumbnail" style="width:130px; height:90px;" src="{{asset('uploads/item/'.$item->image)}}" alt=""></td>
            <td>{{$item->category->category_name}}</td>
            <td>{{$item->item_description}}</td>
            <td>{{$item->item_price}}</td>
            <td>{{$item->created_at}}</td>
            <td>
              <form id="delete-form-{{$item->item_id}}" action="{{url('/admin/recycle/item/delete/'.$item->item_id)}}" style="display:none;">
                @csrf
                @method('delete')
              </form>
              <a href="{{url('/admin/recycle/item/delete/'.$item->item_id)}}" onclick="if(confirm('Are you sure to delete?')){
                event.preventDefault();
                document.getElementById('delete-form-{{$item->item_id}}').submit();} else{
                event.preventDefault();
              }" class="btn btn-danger">Delete</a>
              <a href="{{url('/admin/recycle/item/restore/'.$item->item_id)}}" class="btn btn-primary">Restore</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>