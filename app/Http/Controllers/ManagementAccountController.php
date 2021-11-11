<?php

namespace App\Http\Controllers;

use App\Services\AccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagementAccountController extends Controller
{
    protected $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function index()
    {
        return view('management-accounts.index');
    }

    public function create()
    {
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
