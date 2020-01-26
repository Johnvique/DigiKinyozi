@extends('layouts.frame')
@section('frame')

<div class="container-fluid">
  
       <!-- Button trigger modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus-square" aria-hidden="true"></i>
      Add Menu
    </button>
      <button type="button" class="btn btn-info">
          <i class="fa fa-file-excel" aria-hidden="true"></i>
        Export Excel
     </button>
     <button type="button" class="btn btn-info">
      <i class="fa fa-file-pdf" aria-hidden="true"></i>
    Download PDF
    </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title bg-lg bg-info text-white" id="exampleModalLabel">Manage Menu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card">
                <div class="card-body">
                <form action="{{route('menu.store')}}" method="POST">
                  @csrf
                    <div class="form-group">
                      <label for="serve_name">Service Name</label>
                      <input type="text" class="form-control" name="service_name" id="serve_name" placeholder="Service Name" required>
                    </div>
                    <div class="form-group">
                      <label for="serve_price">Service Prices</label>
                      <input type="text" class="form-control" name="service_price" id="serve_price" placeholder="Service Price" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Reset</button>
                  </form>   
                </div>
              </div>
            </div>
            <div class="modal-footer">
    
            </div>
          </div>
        </div>
      </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-info">Manage Menu</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                      <th>SI</th>
                      <th>Service Name</th>
                      <th>Service Price</th>
                      <th>Edit</th>
                      <th>Delete</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($menus as $menu)
                <tr>
                <td>{{$menu->id}}</td>
                <td>{{$menu->service_name}}</td>
                <td>{{$menu->service_price}}</td>
                <td><a href="{{action('MenuController@edit', $menu->id)}}" class="btn btn-info fa fa-edit btn-sm"></a></td>
                <td><form action="{{action('MenuController@destroy',$menu->id )}}" method="post">
                  @csrf
                  <input type="hidden" name="_method" value="DELETE">
                  <button class="btn btn-danger fa fa-trash-alt btn-sm"></button>
                   </form></td>
              </tr> 
                @endforeach
              </tbody>
              <tfoot>
                  <tr>
                    <th>SI</th>
                    <th>Service Name</th>
                    <th>Service Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
              </tfoot>
          </table>
          </div>
      </div>
</div>
    
@endsection