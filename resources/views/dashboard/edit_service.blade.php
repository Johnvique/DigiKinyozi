@extends('layouts.frame')
@section('frame')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
              <div class="card">
                  <div class="card-body">
                  <form action="{{route('service.update', $service->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                          <label for="service_name">Service Name</label>
                          <input type="text" class="form-control" name="services_name" value="{{$service->services_name}}" id="service_name" placeholder="Name of the service" required>
                        </div>
                        <div class="form-group">
                          <label for="serve_price">Service Price</label>
                          <input type="text" class="form-control" name="services_price" value="{{$service->services_price}}" id="serve_price" placeholder="Price of the service" required>
                        </div>
                        <div class="form-group">
                          <label for="sex">Gender Served</label>
                          <input type="text" class="form-control" name="gender" value="{{$service->gender}}" id="sex" placeholder="Gender Served" required>
                        </div>
                        <button type="submit" class="btn btn-info">Update Services</button>
                      </form> 
                  </div>
              </div>  
            </div>
            <div class="col-md-4">
                
            </div>
        </div>
    </div>   
@endsection