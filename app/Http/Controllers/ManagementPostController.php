<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementPostController extends Controller
{
    public function index()
    {
        return view('management-posts.index');
    }

    public function create()
    {
        return view('management-posts.create');
    }
}
