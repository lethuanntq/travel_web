<?php

namespace App\Models;

class Tour extends BaseModel
{
    public static function rules()
    {
        return [
            'tour.title' => 'required|max:255',
            'tour.description' => 'required|max:255',
            'tour.price' => 'required|digits_between:7,10',
            'tour.price_promotion' => 'max:255',
            'tour.tag' => 'max:255',
            'tour.start_date' => 'required|before:tour.end_date',
            'tour.end_date' => 'required|after:tour.start_date',
        ];
    }

    public static function attributes()
    {
        return [
            'tour.title' => 'title',
            'tour.description' => 'description',
            'tour.price' => 'price',
            'tour.price_promotion' => 'price promotion',
            'tour.tag' => 'tag',
            'tour.start_date' => 'start date',
            'tour.end_date' => 'end date',
        ];
    }
}
