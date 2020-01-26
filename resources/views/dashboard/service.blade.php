@extends('layouts.frame')
@section('frame')

<div class="container-fluid">
  
       <!-- Button trigger modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus-square" aria-hidden="true"></i>
      Add Service
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
              <h5 class="modal-title bg-lg bg-info text-white" id="exampleModalLabel">Manage Services</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card">
                <div class="card-body">
                <form action="{{route('service.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="service_name">Service Name</label>
                      <input type="text" class="form-control" name="services_name" id="service_name" placeholder="Name of the service" required>
                    </div>
                    <div class="form-group">
                      <label for="serve_price">Service Price</label>
                      <input type="text" class="form-control" name="services_price" id="serve_price" placeholder="Price of the service" required>
                    </div>
                    <div class="form-group">
                      <label for="sex">Gender Served</label>
                      <input type="text" class="form-control" name="gender" id="sex" placeholder="Gender Served" required>
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
          <h6 class="m-0 font-weight-bold text-info">Manage Services</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>SI</th>
                <th>Service Name</th>
                <th>Service Price</th>
                <th>Gender Served</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
      @foreach ($services as $service)
      <tr>
      <td>{{$service->id}}</td>
      <td>{{$service->services_name}}</td>
      <td>{{$service->services_price}}</td>
      <td>{{$service->gender}}</td>
      <td><a href="{{action('ServiceController@edit', $service->id)}}" class="btn btn-info fa fa-edit btn-sm"></a></td>
      <td><form action="{{action('ServiceController@destroy',$service->id )}}" method="post">
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
              <th>Gender Served</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
        </tfoot>
    </table>
          </div>
      </div>
</div>
    
@endsection