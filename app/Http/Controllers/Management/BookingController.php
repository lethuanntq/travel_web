<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Tour;
use App\Models\User;
use App\Services\BookingService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function index()
    {
        return view('management.bookings.index');
    }

    public function edit(Booking $booking)
    {
        return view('management.bookings.edit', [
            'booking' => $booking,
        ]);
    }

    public function update(Booking $booking, Request $request)
    {
        $this->bookingService->update($booking, $request);

        return redirect()->route('management.booking.index')->with('message', 'Update thành công!');
    }

    public function delete(Booking $booking)
    {
        $this->bookingService->delete($booking);

        return redirect()->route('management.booking.index')->with('message', 'Xóa thành công');
    }

    public function getData(Request $request)
    {
        $bookings = Booking::select('*');
        if($request->get('status') != '') {
            $bookings = $bookings->where('status', $request->get('status'));
        }
        $bookings->get();
        return Datatables::of($bookings)
            ->editColumn('customer', function ($booking) {
                return $booking->name;
            })
            ->editColumn('tour', function ($booking) {
                return '<a href="' . route('management.tour.edit',
                        $booking->tour_id) . '">' . $booking->tour->title . '</a>';
            })
            ->editColumn('status', function ($booking) {
                switch ($booking->status) {
                    case Booking::BOOKING:
                        $status = '<span class="btn btn-primary btn-sm">'.Booking::LABELS[$booking->status].'</span>';
                        break;
                    case Booking::CONFIRMING:
                        $status = '<span class="btn btn-info btn-sm">'.Booking::LABELS[$booking->status].'</span>';
                        break;
                    case Booking::DEPOSITED:
                        $status = '<span class="btn btn-secondary btn-sm">'.Booking::LABELS[$booking->status].'</span>';
                        break;
                    case Booking::IN_PROCESS:
                        $status = '<span class="btn btn-warning btn-sm">'.Booking::LABELS[$booking->status].'</span>';
                        break;
                    case Booking::COMPLETED:
                        $status = '<span class="btn btn-success btn-sm">'.Booking::LABELS[$booking->status].'</span>';
                        break;
                    default:
                        $status = '<span class="btn btn-danger btn-sm">'.Booking::LABELS[$booking->status].'</span>';
                        break;
                }
                return $status;
            })
            ->addColumn('action', function ($booking) {
                return '<a href="' . route('management.booking.edit', $booking->id) . '" class="btn btn-xs btn-warning">Chỉnh sửa</a>
                        <a href="#" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-confirm-modal"  data-action="' . route('management.booking.delete',
                        $booking->id) . '"' . '> Xóa</a>';
            })->rawColumns(['customer', 'tour', 'status','action'])
            ->make(true);
    }
}
