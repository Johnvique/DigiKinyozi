@extends('layouts.frame')
@section('frame')

<div class="container-fluid">
  
       <!-- Button trigger modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus-square" aria-hidden="true"></i>
      Add Client
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
              <h5 class="modal-title bg-lg bg-info text-white" id="exampleModalLabel">Manage Clients</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card">
                <div class="card-body">
                <form action="{{route('client.store')}}" method="POST">
                  @csrf
                    <div class="form-group">
                      <label for="clin_name">Client Name</label>
                      <input type="text" class="form-control" name="client_name" id="clin_name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                      <label for="clin_mail">Client Email</label>
                      <input type="text" class="form-control" name="client_mail" id="clin_mail" placeholder="Email Adress" required>
                    </div>
                    <div class="form-group">
                      <label for="clin_phone">Client Phone</label>
                      <input type="text" class="form-control" name="client_phone" id="clin_phone" placeholder="Phone Number" required>
                    </div>
                    <div class="form-group">
                      <label for="clin_loc">Client Location</label>
                      <input type="text" class="form-control" name="client_location" id="clin_loc" placeholder="Location" required>
                    </div>
                    <div class="form-group">
                      <label for="clin_img">Client Image</label>
                      <input type="text" class="form-control" name="client_image" id="clin_img" placeholder="Image" required>
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
          <h6 class="m-0 font-weight-bold text-info">Manage Cients</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                      <th>SI</th>
                      <th>Client Name</th>
                      <th>Client Email</th>
                      <th>Client Phone</th>
                      <th>Client Location</th>
                      <th>Client Image</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($clients as $client)
                <tr>
                <td>{{$client->id}}</td>
                  <td>{{$client->client_name}}</td>
                  <td>{{$client->client_mail}}</td>
                  <td>{{$client->client_phone}}</td>
                  <td>{{$client->client_location}}</td>
                  <td>{{$client->client_image}}</td>
                  <td>edit,delete</td>
              </tr>   
                @endforeach
              </tbody>
              <tfoot>
                  <tr>
                    <th>SI</th>
                    <th>Client Name</th>
                    <th>Client Email</th>
                    <th>Client Phone</th>
                    <th>Client Location</th>
                    <th>Client Image</th>
                    <th>Action</th>
                  </tr>
              </tfoot>
          </table>
          </div>
      </div>
</div>
    
@endsection