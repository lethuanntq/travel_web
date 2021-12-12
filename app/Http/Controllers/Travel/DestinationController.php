<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Management\PostController;
use App\Models\Tour;

class DestinationController extends Controller
{
   public function index()
   {
       $destinations =  Tour::query()->orderByDesc('updated_at')->paginate(10);

       return view('travel.destination.index', ['destinations' => $destinations]);
   }

   public function detail(Tour $tour)
   {
       $highlightPosts = app(PostController::class)->getHighlightPosts();

       return view('travel.destination.detail', ['tour' => $tour,'highlightPosts' => $highlightPosts]);
   }
}
