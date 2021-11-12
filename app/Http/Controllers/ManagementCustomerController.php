<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementCustomerController extends Controller
{
    public function index()
    {
        session(['title' => 'Quản lý khách hàng']);
        return view('management-customers.index');
    }

    public function create()
    {
        session(['title' => 'Tạo mới tài khoản']);
        return view('management-customers.create');
    }

    public function edit()
    {
        return view('management-customers.edit');
    }
}
