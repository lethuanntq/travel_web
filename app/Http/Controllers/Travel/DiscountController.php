<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Management\PostController;
use App\Models\Tour;

class DiscountController extends Controller
{
    public function index()
    {
        $posts = Tour::query()->where('type', Tour::TYPE_DISCOUNT)->orderByDesc('updated_at')->paginate(10);
        $highlightPosts = app(PostController::class)->getHighlightPosts();
        return view('travel.discount.index', [
            'posts' => $posts,
            'highlightPosts' => $highlightPosts
        ]);
    }

    public function detail(Tour $post)
    {
        $highlightPosts = app(PostController::class)->getHighlightPosts();
        return view('travel.discount.detail', [
            'post' => $post,
            'highlightPosts' => $highlightPosts
        ]);
    }
}
