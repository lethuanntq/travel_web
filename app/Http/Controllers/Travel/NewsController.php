<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Management\PostController;
use App\Models\Post;

class NewsController extends Controller
{
    public function index()
    {
        $posts = Post::query()->where('type', Post::TYPE_NEWS)->orderByDesc('updated_at')->paginate(10);
        $highlightPosts = app(PostController::class)->getHighlightPosts();

        return view('travel.news.index', [
            'posts' => $posts,
            'highlightPosts' => $highlightPosts
        ]);
    }

    public function detail(Post $post)
    {
        $highlightPosts = app(PostController::class)->getHighlightPosts();
        return view('travel.news.detail', [
            'post' => $post,
            'highlightPosts' => $highlightPosts
        ]);
    }
}
