<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\User;
use App\Services\AccountService;

class ManagementAccountController extends Controller
{
    protected $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function index()
    {
        session(['title' => 'Quản lý tài khoản']);
        return view('management-accounts.index');
    }

    public function create()
    {
        session(['title' => 'Tạo mới tài khoản']);
        return view('management-accounts.create');
    }

    public function store(Request $request)
    {
        $this->accountService->store($request);
        return redirect()->route('management-account.index')->with('message', 'Lưu thành công!');
    }
    public function edit(User $user)
    {
        session(['title' => 'Cập nhật tài khoản']);
        return view('management-accounts.edit', [
            'user' => $user
        ]);
    }

    public function getData()
    {
        return Datatables::of(User::query())->make(true);;
    }
}
