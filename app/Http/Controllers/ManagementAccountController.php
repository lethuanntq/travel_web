<?php

namespace App\Http\Controllers;

use App\Services\AccountService;
use Illuminate\Http\Request;

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
    public function edit()
    {
        return view('management-accounts.edit');
    }

}
