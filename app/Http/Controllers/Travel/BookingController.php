<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use App\Services\BookingService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function store(Request $request)
    {
       $booking = $this->bookingService->store($request);

       if ($booking) {
           return response()->json(['message' => 'Đăng ký tour thành công, chúng tôi sẽ liên lạc qua số điện thoại của bạn một cách nhanh nhất']);
       }
    }
}
