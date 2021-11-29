<?php

namespace App\Http\Controllers\Management;

use App\Models\Customer;
use App\Models\Post;
use App\Models\Tour;
use App\Models\User;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $counts['posts'] = Post::query()->whereNull('deleted_at')->count();
        $counts['tours'] = Tour::query()->whereNull('deleted_at')->count();
        $counts['customer'] = User::query()->where('role', User::ROLE_CUSTOMER)->whereNull('deleted_at')->count();
        $counts['account'] = User::query()->whereNull('deleted_at')->count();
        $counts['customerCancel'] = Customer::query()->whereIn('status', [Customer::STATUS_BOOKING, Customer::STATUS_CANCEL])->whereNull('deleted_at')->count();
        $counts['tourWaitingConfirm'] = Customer::query()->where('status', Customer::STATUS_BOOKING)->whereNull('deleted_at')->count();
        $counts['tourBooking'] = Customer::query()->where('status', Customer::STATUS_PAID)->whereNull('deleted_at')->count();
        $counts['tourCompleted'] = Customer::query()->where('status', Customer::STATUS_COMPLETED)->whereNull('deleted_at')->count();

        return view('home', $counts);
    }
}
