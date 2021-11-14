<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Services\CustomerService;

class ManagementCustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        session(['title' => 'Quản lý khách hàng']);
        return view('management-customers.index');
    }

    public function create()
    {
        session(['title' => 'Tạo mới khách hàng']);
        return view('management-customers.create');
    }

    public function store(Request $request)
    {
        $this->customerService->store($request);
    }

    public function edit(Customer $customer)
    {
        dd($customer);
        return view('management-customers.edit');
    }
}
