<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use App\Models\Post;

class ExperienceController extends Controller
{
    public function index()
    {
        $posts = Post::query()->where('type', Post::TYPE_EXPERIENCE)->orderByDesc('updated_at')->paginate(10);

        return view('travel.experience.index', [
            'posts' => $posts
        ]);
    }

    public function detail(Post $post)
    {
        return view('travel.experience.detail', [
            'post' => $post
        ]);
    }
}
