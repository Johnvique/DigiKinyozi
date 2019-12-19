<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Artist;
use App\Booking;
use App\Service;

class DashboardController extends Controller
{
    public function index(){
        $client_count = Client::count();
        $artist_count = Artist::count();
        $booking_count = Booking::count();
        $service_count = Service::count();

        return view('dashboard/index', compact('client_count','artist_count','booking_count','service_count'));
    }
}
