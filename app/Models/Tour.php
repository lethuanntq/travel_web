<?php

namespace App\Models;

class Tour extends BaseModel
{
    const TYPE_NORMAL = 0;
    const TYPE_DISCOUNT = 1;

    const TYPES = [
        self::TYPE_NORMAL => 'Bình thường',
        self::TYPE_DISCOUNT => 'Khuyến mại',
    ];

    const DISPLAY = 1;
    const PATH = 'tour/';

    public static function rules()
    {
        return [
            'tour.title' => 'required|max:255',
            'tour.short_description' => 'required|max:500',
            'tour.destination_name' => 'required|max:500',
            'tour.description' => 'required',
            'tour.tag' => 'max:255',
            'tour.thumbnail' => 'image|max:2048',
            'tour.price' => 'required|numeric|digits_between:5,12',
            'tour.price_promotion' => 'nullable|numeric|digits_between:5,12',
//            'tour.start_date' => 'required|before:tour.end_date',
//            'tour.end_date' => 'required|after:tour.start_date',
        ];
    }

    public static function attributes()
    {
        return [
            'tour.title' => 'title',
            'tour.short_description' => 'short description',
            'tour.description' => 'description',
            'tour.tag' => 'tag',
            'tour.thumbnail' => 'thumbnail',
            'tour.price' => 'price',
            'tour.price_promotion' => 'price promotion',
//            'tour.start_date' => 'start date',
//            'tour.end_date' => 'end date',
        ];
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
