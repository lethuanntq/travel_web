<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\AccountService;
use Yajra\DataTables\DataTables;

class AccountController extends Controller
{
    protected $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function index()
    {
        return view('management.accounts.index');
    }

    public function create()
    {
        return view('management.accounts.create');
    }

    public function store(Request $request)
    {
        $this->accountService->store($request);
        return redirect()->route('management.account.index')->with('message', 'Lưu thành công!');
    }

    public function edit(User $user)
    {
        $image = Image::query()->where('user_id', $user->id)->first();
        return view('management.accounts.edit', [
            'user' => $user,
            'image' => $image
        ]);
    }

    public function update(User $user,Request $request)
    {
        $this->accountService->update($user, $request);
        return redirect()->route('management.account.index')->with('message', 'Cập nhật thành công!');
    }

    public function getData()
    {
        $users = User::query()->select(['id', 'name', 'email', 'role', 'created_at'])->get();
        return Datatables::of($users)
            ->editColumn('role', function ($user) {
                return User::ROLES[$user->role];
            })
            ->addColumn('action', function ($user) {
                return '<a href="'. route('management.account.edit', $user->id) .'" class="btn btn-xs btn-warning">Chỉnh sửa</a>
                        <a href="#"  class="btn btn-xs btn-danger delete" data-toggle="modal" data-target="#delete-confirm-modal"  data-action="' . route('management.account.delete', $user->id) . '"' . '>Xóa</a>';
            })
            ->make(true);
    }

    public function delete(User $user)
    {
        $this->accountService->delete($user);

        return redirect()->route('management.account.index')->with('message', 'Xóa thành công');
    }
}
