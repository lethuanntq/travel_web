<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementAccountController extends Controller
{
    public function index()
    {
        return view('management-accounts.index');
    }

    public function create()
    {
        return view('management-accounts.create');
    }

    public function edit()
    {
        return view('management-accounts.edit');
    }

}
