<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Management\PostController;
use App\Models\Post;

class ExperienceController extends Controller
{
    public function index()
    {
        $posts = Post::query()->where('type', Post::TYPE_EXPERIENCE)->orderByDesc('updated_at')->paginate(10);
        $highlightPosts = app(PostController::class)->getHighlightPosts();

        return view('travel.experience.index', [
            'posts' => $posts,
            'highlightPosts' => $highlightPosts
        ]);
    }

    public function detail(Post $post)
    {
        $highlightPosts = app(PostController::class)->getHighlightPosts();
        return view('travel.experience.detail', [
            'post' => $post,
            'highlightPosts' => $highlightPosts
        ]);
    }
}
