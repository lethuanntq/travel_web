<?php

namespace App\Services;

use App\Models\Booking;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BookingService extends BaseService
{
    public function store(Request $request)
    {
        $rules = Booking::rules();
        $attrs = Booking::attributes();
        $bookingData = $request->all();
        if ($bookingData['booking']) {
            $bookingData['booking']['status'] = Booking::BOOKING;
        }
        DB::beginTransaction();
        try {
            $this->validate($bookingData, $rules, $attrs);
            $booking = new Booking();
            $booking->status = Booking::BOOKING;
            $this->save($booking, $request);
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }

        return $booking;
    }

    public function save(Booking $booking, Request $request)
    {
        $booking->fill($request->input('booking'));

        return $booking->save();
    }

    public function update(Booking $booking, Request $request)
    {
        $rules = Booking::rules();
        $attrs = Booking::attributes();
        $operator = Auth::user();
        $booking->updated_by = $operator->id;

        DB::beginTransaction();
        try {
            $this->validate($request->all(), $rules, $attrs);
            $this->save($booking, $request);
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }

        return $booking;
    }

    public function delete(Booking $booking)
    {
        $operator = Auth::user();

        DB::beginTransaction();
        try {
            $booking->delete();
            $booking->deleted_by = $operator->id;
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }

        return true;
    }


    /**
     * @param Booking $booking
     * @return array
     */
    public function analytic(Booking $booking)
    {
       $bookingData = Booking::where('created_at', '>=', \Carbon\Carbon::now()->subDays(10))
                            ->groupBy('date')
        ->orderBy('date', 'DESC')
        ->get(array(
            DB::raw('Date(created_at) as date'),
            DB::raw('COUNT(*) as "total"')
        ))->keyBy('date');
        $data = [];
        for ($i = 10; $i >= 0; $i--) {
            $month = Carbon::now()->subDays($i)->format('Y-m-d');
            $data['month'][] = Carbon::now()->subDays($i)->format('d-m-Y');
            if(isset($bookingData[$month])){
                $data['totals'][] = $bookingData[$month]['total'];
            }else{
                $data['totals'][] = 0;
            }
        }
        return $data;
    }

    /**
     * @param Booking $booking
     * @return mixed
     */
    public function bookingBiggest(Booking $booking) {
        return $booking->select(['bookings.*','tours.title as tour_title','tours.slug', DB::raw('COUNT(*) as count')])
            ->join('tours', 'tours.id', '=', 'bookings.tour_id')
            ->groupBy('tour_id')
            ->orderBy('count', 'desc')->limit(4)
            ->get();
    }
}
