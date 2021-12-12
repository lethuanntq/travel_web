<?php

namespace App\Models;

class Post extends BaseModel
{
    const TYPE_EXPERIENCE = 0;
    const TYPE_NEWS = 1;

    const HIGHLIGHT = 1;
    const MAX_POSTS_HIGHLIGHT = 5;

    const TYPES = [
        self::TYPE_EXPERIENCE => 'Kinh nghiệm',
        self::TYPE_NEWS => 'Tin tức'
    ];

    const PATH = 'post/';

    public static function rules()
    {
        return [
            'post.title' => 'required|max:255',
            'post.short_description' => 'required|max:500',
            'post.description' => 'required',
            'post.tag' => 'max:255',
            'post.type' => 'required',
            'post.thumbnail' => 'image|max:2048',
        ];
    }

    public static function attributes()
    {
        return [
            'post.title' => 'title',
            'post.short_description' => 'short description',
            'post.description' => 'description',
            'post.tag' => 'tag',
            'post.type' => 'type',
            'post.thumbnail' => 'thumbnail',
        ];
    }
}
