<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementPostController extends Controller
{
    public function index()
    {
        session(['title' => 'Quản lý bài viết']);
        return view('management-posts.index');
    }

    public function create()
    {
        session(['title' => 'Tạo mới bài viết']);
        return view('management-posts.create');
    }

    public function edit()
    {
        return view('management-posts.edit');
    }
}
