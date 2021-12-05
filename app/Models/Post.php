<?php

namespace App\Models;

class Post extends BaseModel
{
    const TYPE_DISCOUNT = 0;
    const TYPE_EXPERIENCE = 1;
    const TYPE_DESTINATION = 2;
    const TYPE_LIBRARY = 3;

    const TYPES = [
        self::TYPE_DISCOUNT => 'Khuyến mại',
        self::TYPE_EXPERIENCE => 'Kinh nghiệm',
        self::TYPE_DESTINATION => 'Điểm đến',
        self::TYPE_LIBRARY => 'Thư viện'
    ];

    const PATH = 'post/';

    public static function rules()
    {
        return [
            'post.title' => 'required|max:255',
            'post.tag' => 'max:255',
            'post.short_description' => 'required|max:500',
            'post.description' => 'required',
            'post.type' => 'required',
            'post.thumbnail' => 'image|max:2048',
        ];
    }

    public static function attributes()
    {
        return [
            'post.title' => 'title',
            'post.tag' => 'tag',
            'post.short_description' => 'short description',
            'post.description' => 'description',
            'post.type' => 'type',
            'post.thumbnail' => 'thumbnail',
        ];
    }
}
