<?php

namespace App\Models;

use App\Rules\PhoneNumberVNRule;

class Booking extends BaseModel
{
    const BOOKING = 0;
    const CONFIRMING = 1;
    const DEPOSITED = 2;
    const IN_PROCESS= 3;
    const COMPLETED = 4;
    const CANCEL = 5;

    const STATUS = [
        self::BOOKING => 'Đã đặt tour',
        self::CONFIRMING => 'Đang xác nhận',
        self::DEPOSITED => 'Đã đặt cọc',
        self::IN_PROCESS => 'Đang tiến hành tour',
        self::COMPLETED => 'Hoàn thành đặt tour',
        self::CANCEL => 'Hủy tour'
    ];
    const LABELS = [
        self::BOOKING => 'Mới',
        self::CONFIRMING => 'Đang đợi phản hồi',
        self::DEPOSITED => 'Đã đặt cọc',
        self::IN_PROCESS => 'Đang tiến hành',
        self::COMPLETED => 'Đã hoàn thành',
        self::CANCEL => 'Đã hủy'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }

    public static function rules()
    {
        return [
            'booking.tour_id' => 'required|max:255',
            'booking.name' => 'required|max:255',
            'booking.status' => 'required',
            'booking.phone' => ['required', new PhoneNumberVNRule()],
            'booking.adult' => 'required|numeric|min:0',
            'booking.child' => 'required|numeric|min:0',
            'booking.start_date' => 'required|before_or_equal:booking.end_date',
            'booking.end_date' => 'required|after_or_equal:booking.start_date',
        ];
    }

    public static function attributes()
    {
        return [
            'booking.tour_id' => 'tour',
            'booking.status' => 'status',
            'booking.phone' => 'Số điện thoại',
            'booking.adult' => 'Số lượng người lớn',
            'booking.child' => 'Số lượng trẻ em',
            'booking.start_date' => 'ngày bắt đầu',
            'booking.end_date' => 'ngày kết thúc ',
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
