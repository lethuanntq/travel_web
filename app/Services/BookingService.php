<?php

namespace App\Services;

use App\Models\Booking;
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
        $operator = Auth::user();
        
        DB::beginTransaction();
        try {
            $this->validate($request->all(), $rules, $attrs);
            $booking = new Booking();
            $booking->created_by = $operator->id;
            $booking->updated_by = $operator->id;
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
}
