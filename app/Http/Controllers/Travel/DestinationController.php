<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Management\PostController;
use App\Models\Destination;
use App\Models\Tour;
use App\Services\TourService;
use AWS\CRT\HTTP\Request;

class DestinationController extends Controller
{

   public function index()
   {
       $destinations = Tour::select(['destination_slug','destination_name'])->distinct()->get();
       return view('travel.destination.index', ['destinations' => $destinations]);
   }

   public function detail($destination_slug, TourService $tourService)
   {
       $highlightPosts = app(PostController::class)->getHighlightPosts();
       $tours = $tourService->getTourByDestination($destination_slug);
       return view('travel.destination.detail', [
           'tours' => $tours,
           'highlightPosts' => $highlightPosts
       ]);
   }

//    public function tour(Destination $destination, Tour $tour)
//    {
//        $highlightPosts = app(PostController::class)->getHighlightPosts();
//
//        return view('travel.tour.detail', [
//            'tour' => $tour,
//            'highlightPosts' => $highlightPosts
//        ]);
//    }
}
