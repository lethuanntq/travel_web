<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Management\PostController;
use App\Models\Destination;
use App\Models\Tour;
use App\Services\TourService;

class TourController extends Controller
{

    public function detail($slug)
    {
        $tour = TourService::detail($slug);

        $highlightPosts = app(PostController::class)->getHighlightPosts();
        return view('travel.tour.detail', [
            'tour' => $tour,
            'highlightPosts' => $highlightPosts
        ]);
    }
}
