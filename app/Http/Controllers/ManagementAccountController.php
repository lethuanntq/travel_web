<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\AccountService;
use Yajra\DataTables\DataTables;

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

    public function update(User $user,Request $request)
    {
        $this->accountService->update($user, $request);
        return redirect()->route('management-account.index')->with('message', 'Cập nhật thành công!');
    }

    public function getData()
    {
        $users = User::query()->select(['id', 'name', 'email', 'role', 'created_at'])->get();
        return Datatables::of($users)
            ->editColumn('role', function ($user) {
                return User::ROLES[$user->role];
            })
            ->addColumn('action', function ($user) {
                return '<a href="' . route('management-account.create') . '" class="btn btn-xs btn-success"><i class="fa fa-new"></i>Create</a>
                        <a href="'. route('management-account.edit', $user->id) .'" class="btn btn-xs btn-warning"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                        <a href="#" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-confirm-modal"  data-action="' . route('management-account.delete', $user->id) . '"' . '><i class="fa fa-times"></i> Delete</a>';
            })
            ->make(true);
    }

    public function delete(User $user)
    {
        dd($user);
        $this->accountService->delete($user);

        return redirect()->route('management-account.index')->with('message', 'Xóa thành công');
    }
}
