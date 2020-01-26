@extends('layouts.frame')
@section('frame')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
              <div class="card">
                  <div class="card-body">
                  <form action="{{route('artist.update', $artist->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                          <div class="form-group">
                            <label for="user">Artist Name</label>
                            <input type="text" class="form-control" name="artist_name" value="{{$artist->artist_name}}" id="user" aria-describedby="emailHelp" placeholder="Name" required>
                          </div>
                          <div class="form-group">
                            <label for="Phone_num">Phone Number</label>
                            <input type="text" class="form-control" name="artist_phone" value="{{$artist->artist_phone}}" id="Phone_num" placeholder="Phone Number" required>
                          </div>
                          <div class="form-group">
                            <label for="post">Role</label>
                            <input type="text" class="form-control" name="artist_role" value="{{$artist->artist_role}}" id="post" placeholder="Position" required>
                          </div>
                          <div class="form-group">
                            <label for="img">Artist Image</label>
                            <input type="text" class="form-control" name="picture" value="{{$artist->picture}}" id="img" placeholder="Image" required>
                          </div>
                          <button type="submit" class="btn btn-info">Update Artist</button>
                        </form> 
                  </div>
              </div>  
            </div>
            <div class="col-md-4">
                
            </div>
        </div>
    </div>   
@endsection