<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('dashboard/booking', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $booking = new Booking;
        $booking->clin_name =$request->get ('clin_name');
        $booking->book_date =$request->get ('book_date');
        $booking->service_booked =$request->get ('service_booked');
        $booking->book_time =$request->get ('book_time');
        $booking->customer_phone =$request->get ('customer_phone');
        $booking->customer_mail =$request->get ('customer_mail');
        $booking->message =$request->get ('message');

        $booking ->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        return view('dashboard/edit_booking', compact('booking'));
        
        return redirect('booking');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $booking = Booking::find($id);
        $booking->update([
            'clin_name'=>$request->clin_name,
            'book_date'=>$request->book_date,
            'service_booked'=>$request->service_booked,
            'book_time'=>$request->book_time,
            'customer_phone'=>$request->customer_phone,
            'customer_mail'=>$request->customer_mail,
            'message'=>$request->message
        ]); 

        return redirect('booking');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return redirect('booking');
    }
}
