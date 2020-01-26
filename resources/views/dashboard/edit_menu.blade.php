@extends('layouts.frame')
@section('frame')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
              <div class="card">
                  <div class="card-body">
                  <form action="{{route('menu.update', $menu->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                          <div class="form-group">
                            <label for="serve_name">Service Name</label>
                            <input type="text" class="form-control" name="service_name" value="{{$menu->service_name}}" id="serve_name" placeholder="Service Name" required>
                          </div>
                          <div class="form-group">
                            <label for="serve_price">Service Prices</label>
                            <input type="text" class="form-control" name="service_price" value="{{$menu->service_price}}" id="serve_price" placeholder="Service Price" required>
                          </div>
                          <button type="submit" class="btn btn-info">Update Menu</button>
                        </form>
                  </div>
              </div>  
            </div>
            <div class="col-md-4">
                
            </div>
        </div>
    </div>   
@endsection