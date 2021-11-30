<?php

namespace App\Models;

class Post extends BaseModel
{
    const MIEN_BAC = 0;
    const MIEN_TRUNG = 1;
    const MIEN_NAM = 2;
    const TAY_NGUYEN = 3;
    
    const REGIONS = [
        self::MIEN_BAC => 'Miền Bắc',
        self::MIEN_TRUNG => 'Miền Trung',
        self::MIEN_NAM => 'Miền Nam',
        self::TAY_NGUYEN => 'Tây Nguyên'
    ];
    
    public static function rules()
    {
        return [
            'post.title' => 'required|max:255',
            'post.tag' => 'max:255',
            'post.description' => 'required',
        ];
    }

    public static function attributes()
    {
        return [
            'post.title' => 'title',
            'post.tag' => 'tag',
            'post.description' => 'description',
        ];
    }
}
