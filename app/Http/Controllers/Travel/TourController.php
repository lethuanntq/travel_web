<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Management\PostController;
use App\Models\Destination;
use App\Models\Tour;
use App\Services\TourService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TourController extends Controller
{

    protected $tourService;

    public function __construct(TourService $tourService)
    {
        $this->tourService = $tourService;
    }

    public function detail($slug)
    {
        $tour = TourService::detail($slug);

        $highlightPosts = app(PostController::class)->getHighlightPosts();
        return view('travel.tour.detail', [
            'tour' => $tour,
            'highlightPosts' => $highlightPosts
        ]);
    }


    public function rating(Request $request)
    {
        $this->tourService->rating($request);
        return response()->json(['message' => 'Đánh giá thành công!']);
    }

    public function ratingStar(Request $request)
    {
        $vote = $this->tourService->ratingStar($request);
        return response()->json(['vote' => $vote, 'message' => 'Đánh giá thành công!']);
    }
}
