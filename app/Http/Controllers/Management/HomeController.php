<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Services\BookingService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(BookingService $bookingService,Booking $booking)
    {
        $bookingBiggest = $bookingService->bookingBiggest($booking);
        $analytic = $bookingService->analytic($booking);
        return view('management.home', compact(['analytic','bookingBiggest']));
    }
}
