@extends('layouts.frame')
@section('frame')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
              <div class="card">
                  <div class="card-body">
                  <form action="{{route('booking.update', $booking->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                          <div class="form-group">
                            <label for="user">Client Name</label>
                            <input type="text" class="form-control" name="clin_name" value="{{$booking->clin_name}}" id="user" placeholder="Name" required>
                          </div>
                          <div class="form-group">
                            <label for="book_date">Booking Date</label>
                            <input type="date" class="form-control" name="book_date" value="{{$booking->book_date}}" id="book_date" placeholder="Date of Booking" required>
                          </div>
                          <div class="form-group">
                            <label for="serv_book">Service Booked</label>
                            <input type="text" class="form-control" name="service_booked" value="{{$booking->service_booked}}" id="serv_book" placeholder="Service Booked" required>
                          </div>
                          <div class="form-group">
                            <label for="time_book">Booking Time</label>
                            <input type="text" class="form-control" name="book_time" value="{{$booking->book_time}}" id="time_book" placeholder="Booking Time" required>
                          </div>
                          <div class="form-group">
                            <label for="cust_phone">Customer Phone</label>
                            <input type="text" class="form-control" name="customer_phone" value="{{$booking->customer_phone}}" id="cust_phone" placeholder="Phone Number" required>
                          </div>
                          <div class="form-group">
                            <label for="cus_mail">Customer Email</label>
                            <input type="text" class="form-control" name="customer_mail" value="{{$booking->customer_mail}}" id="cust_mail" placeholder="Email Adress" required>
                          </div>
                          <div class="form-group">
                            <label for="cust_msg">Booking Message</label>
                            <input type="text-area" value="{{$booking->message}}">
                            <textarea class="form-control" name="message" id="cust_msg" rows="2" placeholder="Enter the Text Message Here....."></textarea>
                          </div>
                          <button type="submit" class="btn btn-info">Update Booking</button>
                        </form> 
                  </div>
              </div>  
            </div>
            <div class="col-md-4">
                
            </div>
        </div>
    </div>   
@endsection