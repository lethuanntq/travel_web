<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('travel.index');
    }

    public function aboutMe()
    {
        return view('travel.pages.about_me');
    }
}
