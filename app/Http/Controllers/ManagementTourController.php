<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementTourController extends Controller
{
    public function index()
    {
        session(['title' => 'Quản lý tour']);
        return view('management-tours.index');
    }

    public function create()
    {
        session(['title' => 'Tạo mới tour']);
        return view('management-tours.create');
    }

    public function edit()
    {
        return view('management-tours.edit');
    }
}
