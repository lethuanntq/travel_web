<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\User;
use Carbon\Carbon;
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
        $currentTime = Carbon::now()->format('Y-m-d H:i:s');
        $listCustomers = User::query()->where('role', User::ROLE_CUSTOMER)->whereNull('deleted_at')->get();
        $tours = Tour::query()->whereDate('start_date', '<=', $currentTime)
            ->whereDate('end_date', '>=', $currentTime)
            ->get();

        return view('management.customers.create', [
            'listCustomers' => $listCustomers,
            'tours' => $tours
        ]);
    }

    public function store(Request $request)
    {
        $this->customerService->store($request);
        return redirect()->route('management.customer.index')->with('message', 'Lưu thành công!');
    }

    public function edit(Customer $customer)
    {
        $currentTime = Carbon::now()->format('Y-m-d H:i:s');
        $listCustomers = User::query()->where('role', User::ROLE_CUSTOMER)
            ->rightJoin('customers', function ($customer) {
                $customer->on('customers.user_id', '=', 'users.id');
                $customer->where('customers.status','=', Customer::STATUS_COMPLETED);
            })
            ->get();
//        dd($listCustomers->toSql());
        $tours = Tour::query()->whereDate('start_date', '<=', $currentTime)
            ->whereDate('end_date', '>=', $currentTime)
            ->get();

        return view('management.customers.edit', [
            'listCustomers' => $listCustomers,
            'customer' => $customer,
            'tours' => $tours
        ]);
    }

    public function update(Customer $customer, Request $request)
    {
        $this->customerService->update($customer, $request);

        return redirect()->route('management.customer.index')->with('message', 'Update thành công!');
    }

    public function delete(Customer $customer)
    {
        $this->customerService->delete($customer);

        return redirect()->route('management.customer.index')->with('message', 'Xóa thành công');
    }

    public function getData()
    {
        $customers = Customer::query()->select(['id', 'user_id', 'number_booked', 'status'])->whereNull('deleted_at')->get();
        $names = User::query()->select(['id', 'name'])->where('role', User::ROLE_CUSTOMER)->get()->keyBy('id');

        return Datatables::of($customers)
            ->editColumn('user_id', function ($customer) use ($names){
                return  '<a href="' . route('management.account.edit', $customer->user_id) . '">'. $names[$customer->user_id]['name'] .'</a>';
            })
            ->editColumn('status', function ($customer){
                return Customer::STATUS[$customer->status];
            })
            ->addColumn('action', function ($customer) {
                return '<a href="'. route('management.customer.edit', $customer->id) .'" class="btn btn-xs btn-warning"><i class="fa fa-edit" aria-hidden="true"></i></a>
                        <a href="#" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-confirm-modal"  data-action="' . route('management.customer.delete', $customer->id) . '"' . '><i class="fa fa-times"></i></a>';
            })->rawColumns(['user_id', 'action'])
            ->make(true);
    }
}
