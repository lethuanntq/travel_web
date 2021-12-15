<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Management\PostController;
use App\Models\Destination;
use App\Models\Tour;

class DestinationController extends Controller
{
   public function index()
   {
       $destinations =  Destination::query()->orderByDesc('updated_at')->paginate(10);

       return view('travel.destination.index', ['destinations' => $destinations]);
   }

   public function detail(Destination $destination)
   {
       $highlightPosts = app(PostController::class)->getHighlightPosts();

       return view('travel.destination.detail', [
           'destination' => $destination,
           'highlightPosts' => $highlightPosts
       ]);
   }

    public function tour(Destination $destination, Tour $tour)
    {
        $highlightPosts = app(PostController::class)->getHighlightPosts();

        return view('travel.tour.detail', [
            'tour' => $tour,
            'highlightPosts' => $highlightPosts
        ]);
    }
}
