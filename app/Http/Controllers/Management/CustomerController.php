<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Services\CustomerService;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        return view('management.customers.index');
    }

    public function create()
    {
        return view('management.customers.create');
    }

    public function store(Request $request)
    {
        $this->customerService->store($request);
    }

    public function edit(Customer $customer)
    {
        return view('management.customers.edit');
    }

    public function delete(Customer $customer)
    {
        return view('management.customers.edit');
    }

    public function getData()
    {
        $customers = Customer::query()->select(['id', 'user_id', 'number_booked', 'status'])->get();
        $names = User::query()->select(['id', 'name'])->get()->keyBy('id');

        return Datatables::of($customers)
            ->editColumn('user_id', function ($customer) use ($names){
                return  '<a href="' . route('management.account.edit', $customer->user_id) . '">'. $names[$customer->user_id]['name'] .'</a>';
            })
            ->editColumn('status', function ($customer){
                return Customer::STATUS[$customer->status];
            })
            ->addColumn('action', function ($customer) {
                return '<a href="'. route('management.customer.edit', $customer->id) .'" class="btn btn-xs btn-warning"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                        <a href="#" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-confirm-modal"  data-action="' . route('management.customer.delete', $customer->id) . '"' . '><i class="fa fa-times"></i> Delete</a>';
            })->rawColumns(['user_id', 'action'])
            ->make(true);
    }
}
