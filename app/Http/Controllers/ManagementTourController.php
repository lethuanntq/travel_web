<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementTourController extends Controller
{
    public function index()
    {
        return view('management-tours.index');
    }
}
