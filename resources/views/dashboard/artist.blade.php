@extends('layouts.frame')
@section('frame')

<div class="container-fluid">
  
       <!-- Button trigger modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus-square" aria-hidden="true"></i>
      Add Artist
    </button>
      <button type="button" class="btn btn-info">
          <i class="fa fa-file-excel" aria-hidden="true"></i>
        Export Excel
     </button>
        <button type="button" class="btn btn-info" onclick="PrintDiv()">
              <i class="fa fa-print" aria-hidden="true"></i>
            Print
        </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title bg-lg bg-info text-white" id="exampleModalLabel">Manage Artists</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card">
                <div class="card-body">
                <form action="{{route('artist.store')}}" method="POST">
                  @csrf
                    <div class="form-group">
                      <label for="user">Artist Name</label>
                      <input type="text" class="form-control" name="artist_name" id="user" aria-describedby="emailHelp" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                      <label for="Phone_num">Phone Number</label>
                      <input type="text" class="form-control" name="artist_phone" id="Phone_num" placeholder="Phone Number" required>
                    </div>
                    <div class="form-group">
                      <label for="post">Role</label>
                      <input type="text" class="form-control" name="artist_role" id="post" placeholder="Position" required>
                    </div>
                    <div class="form-group">
                      <label for="img">Artist Image</label>
                      <input type="text" class="form-control" name="artist_image" id="img" placeholder="Image" required>
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
          <h6 class="m-0 font-weight-bold text-info">Manage Artists</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>SI</th>
                <th>Artist Name</th>
                <th>Phone Number</th>
                <th>Role</th>
                <th>Artist Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($artists as $artist)
          <tr>
          <td>{{$artist->id}}</td>
            <td>{{$artist->artist_name}}</td>
            <td>{{$artist->artist_phone}}</td>
            <td>{{$artist->artist_role}}</td>
            <td>{{$artist->artist_image}}</td>
            <td>edit,delete</td>
        </tr>
          @endforeach
        </tbody>
        <tfoot>
            <tr>
              <th>SI</th>
              <th>Artist Name</th>
              <th>Phone Number</th>
              <th>Role</th>
              <th>Artist Image</th>
              <th>Action</th>
            </tr>
        </tfoot>
    </table>
          </div>
      </div>
</div>
    
@endsection