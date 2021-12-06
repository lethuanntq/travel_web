<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use App\Models\Tour;

class DiscountController extends Controller
{
    public function index()
    {
        $posts = Tour::query()->where('type', Tour::TYPE_DISCOUNT)->orderByDesc('updated_at')->paginate(10);

        return view('travel.discount.index', [
            'posts' => $posts
        ]);
    }

    public function detail(Tour $post)
    {
        return view('travel.discount.detail', [
            'post' => $post
        ]);
    }
}
