<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Management\PostController;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('travel.index');
    }

    public function aboutMe()
    {
        $highlightPosts = app(PostController::class)->getHighlightPosts();
        return view('travel.pages.about_me', ['highlightPosts' => $highlightPosts]);
    }

    public function conTact()
    {

    }
}
