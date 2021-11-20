<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    const STATUS_BOOKING = 0;
    const STATUS_PAID = 1;
    const STATUS_CANCEL = 2;
    const STATUS_COMPLETED = 3;

    const STATUS = [
        self::STATUS_BOOKING => 'Đang booking',
        self::STATUS_PAID => 'Đã thanh toán',
        self::STATUS_CANCEL => 'Hủy bỏ tour',
        self::STATUS_COMPLETED => 'Hoàn thành tour'
    ];

    public static function rules()
    {
        return [
            'customer.user_id' => 'required',
            'customer.tour_id' => 'required',
            'customer.status' => 'required',
        ];
    }

    public static function attributes()
    {
        return [
            'customer.user_id' => 'name',
            'customer.tour_id' => 'tour',
            'customer.status' => 'status',
        ];
    }
}
