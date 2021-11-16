<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public static function rules()
    {
        return [
            'post.title' => 'required|max:255',
            'post.seo_tag' => 'required|max:255',
            'post.seo_description' => 'required|max:255',
            'post.key_word' => 'required|max:255',
            'post.description' => 'required|max:255',
        ];
    }

    public static function attributes()
    {
        return [
            'post.title' => 'title',
            'post.seo_tag' => 'seo tag',
            'post.seo_description' => 'seo description',
            'post.key_word' => 'key word',
            'post.description' => 'description',
        ];
    }
}
