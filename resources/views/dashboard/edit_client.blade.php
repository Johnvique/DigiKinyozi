@extends('layouts.frame')
@section('frame')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
              <div class="card">
                  <div class="card-body">
                  <form action="{{route('client.update', $client->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                          <div class="form-group">
                            <label for="clin_name">Client Name</label>
                            <input type="text" class="form-control" name="client_name" value="{{$client->client_name}}" id="clin_name" placeholder="Name" required>
                          </div>
                          <div class="form-group">
                            <label for="clin_mail">Client Email</label>
                            <input type="text" class="form-control" name="client_mail" value="{{$client->client_mail}}" id="clin_mail" placeholder="Email Adress" required>
                          </div>
                          <div class="form-group">
                            <label for="clin_phone">Client Phone</label>
                            <input type="text" class="form-control" name="client_phone" value="{{$client->client_phone}}" id="clin_phone" placeholder="Phone Number" required>
                          </div>
                          <div class="form-group">
                            <label for="clin_loc">Client Location</label>
                            <input type="text" class="form-control" name="client_location" value="{{$client->client_location}}" id="clin_loc" placeholder="Location" required>
                          </div>
                          <div class="form-group">
                            <label for="image">Client Image: </label>
                            <input type="file" name="picture" value="{{$client->picture}}" class="form-control" id="picture"  placeholder="Upload the Image Here"
                             onchange="return imageval()">
                          </div>
                          <button type="submit" class="btn btn-info">Update Client</button>
                        </form> 
                  </div>
              </div>  
            </div>
            <div class="col-md-4">
                
            </div>
        </div>
    </div>   
@endsection