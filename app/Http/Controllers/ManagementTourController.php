<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementTourController extends Controller
{
    public function index()
    {
        return view('management-tours.index');
    }

    public function create()
    {
        return view('management-tours.create');
    }

    public function edit()
    {
        return view('management-tours.edit');
    }
}
