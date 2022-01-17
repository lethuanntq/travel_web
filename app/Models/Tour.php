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
            'tour.price_promotion' => 'nullable|numeric|digits_between:5,12|lt:tour.price',
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

    public function getVoteAttribute(){
        $total = ($this->star_1 * 1) + ($this->star_2 * 2) + ($this->star_3 * 3) + ($this->star_4 * 4) + ($this->star_5 * 5);
        $totalVote = $this->star_1 + $this->star_2 + $this->star_3 + $this->star_4 + $this->star_5;
        if($totalVote != 0 || $total != 0 ){
             return intval($total/$totalVote);
        }
        return 0;
    }
}
