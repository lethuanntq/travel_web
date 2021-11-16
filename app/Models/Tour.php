<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    public static function rules()
    {
        return [
            'tour.title' => 'required|max:255',
            'tour.description' => 'required|max:255',
            'tour.price' => 'required|max:255',
            'tour.price_promotion' => 'required|max:255',
            'tour.key_word' => 'required|max:255',
            'tour.seo_tag' => 'required|max:255',
            'tour.seo_description' => 'required|max:255',
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
            'tour.key_word' => 'key word',
            'tour.seo_tag' => 'seo tag',
            'tour.seo_description' => 'seo description',
            'tour.start_date' => 'start date',
            'tour.end_date' => 'end date',
        ];
    }
}
