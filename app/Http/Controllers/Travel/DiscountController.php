<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use App\Models\Post;

class DiscountController extends Controller
{
    public function index()
    {
        $posts = Post::query()->orderByDesc('updated_at')->paginate(10);

        return view('travel.discount.index', [
            'posts' => $posts
        ]);
    }

    public function detail(Post $post)
    {
        return view('travel.discount.detail', [
            'post' => $post
        ]);
    }
}
