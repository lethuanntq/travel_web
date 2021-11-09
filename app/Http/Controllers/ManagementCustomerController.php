<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementCustomerController extends Controller
{
    public function index()
    {
        return view('management-customers.index');
    }
}
