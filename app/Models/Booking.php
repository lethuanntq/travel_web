<?php

namespace App\Models;

class Booking extends BaseModel
{
    const BOOKING = 0;
    const PAID = 1;
    const CANCEL = 2;
    const COMPLETED = 3;
    
    const STATUS = [
        self::BOOKING => 'Đang booking',
        self::PAID => 'Đã thanh toán',
        self::CANCEL => 'Hủy bỏ tour',
        self::COMPLETED => 'Hoàn thành tour',
    ];
    
    public static function rules()
    {
        return [
            'booking.user_id' => 'required',
            'booking.tour_id' => 'required',
            'booking.status' => 'required',
        ];
    }
    
    public static function attributes()
    {
        return [
            'booking.user_id' => 'customer',
            'booking.tour_id' => 'tour',
            'booking.status' => 'status',
        ];
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
