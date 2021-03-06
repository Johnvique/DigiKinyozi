@extends('layouts.frame')
@section('frame')

<div class="container-fluid">
  
       <!-- Button trigger modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus-square" aria-hidden="true"></i>
      Add Booking
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
              <h5 class="modal-title bg-lg bg-info text-white" id="exampleModalLabel">Manage Bookings</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card">
                <div class="card-body">
                <form action="{{route('booking.store')}}" method="POST">
                  @csrf
                    <div class="form-group">
                      <label for="user">Client Name</label>
                      <input type="text" class="form-control" name="clin_name" id="user" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                      <label for="book_date">Booking Date</label>
                      <input type="date" class="form-control" name="book_date" id="book_date" placeholder="Date of Booking" required>
                    </div>
                    <div class="form-group">
                      <label for="serv_book">Service Booked</label>
                      <input type="text" class="form-control" name="service_booked" id="serv_book" placeholder="Service Booked" required>
                    </div>
                    <div class="form-group">
                      <label for="time_book">Booking Time</label>
                      <input type="text" class="form-control" name="book_time" id="time_book" placeholder="Booking Time" required>
                    </div>
                    <div class="form-group">
                      <label for="cust_phone">Customer Phone</label>
                      <input type="text" class="form-control" name="customer_phone" id="cust_phone" placeholder="Phone Number" required>
                    </div>
                    <div class="form-group">
                      <label for="cus_mail">Customer Email</label>
                      <input type="text" class="form-control" name="customer_mail" id="cust_mail" placeholder="Email Adress" required>
                    </div>
                    <div class="form-group">
                      <label for="cust_msg">Booking Message</label>
                      <textarea class="form-control" name="message" id="cust_msg" rows="2" placeholder="Enter the Text Message Here....."></textarea>
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
          <h6 class="m-0 font-weight-bold text-info">Manage Bookings</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                      <th>SI</th>
                      <th>Client Name</th>
                      <th>Booking Date</th>
                      <th>Service Booked</th>
                      <th>Booking Time</th>
                      <th>Customer Phone</th>
                      <th>Customer Email</th>
                      <th>Booking Message</th>
                      <th>Edit</th>
                      <th>Delete</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($bookings as $booking)
                <tr>
                <td>{{$booking->id}}</td>
                  <td>{{$booking->clin_name}}</td>
                  <td>{{$booking->book_date}}</td>
                  <td>{{$booking->service_booked}}</td>
                  <td>{{$booking->book_time}}</td>
                  <td>{{$booking->customer_phone}}</td>
                  <td>{{$booking->customer_mail}}</td>
                  <td>{{$booking->message}}</td>
                  <td><a href="{{action('BookingController@edit', $booking->id)}}" class="btn btn-info fa fa-edit btn-sm"></a></td>
                  <td><form action="{{action('BookingController@destroy',$booking->id )}}" method="post">
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
                    <th>Client Name</th>
                    <th>Booking Date</th>
                    <th>Service Booked</th>
                    <th>Booking Time</th>
                    <th>Customer Phone</th>
                    <th>Customer Email</th>
                    <th>Booking Message</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
              </tfoot>
          </table>
          </div>
      </div>
</div>
    
@endsection