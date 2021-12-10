<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AccountService extends BaseService
{
    public function store(Request $request)
    {
        $rules = User::rules();
        $attrs = User::attributes();
        $operator = Auth::user();

        DB::beginTransaction();
        try {
            $this->validate($request->all(), $rules, $attrs);
            $user = new User();
            $user->updated_by = $operator->id;
            $user->created_by = $operator->id;
            $this->save($user, $request);

            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }

        return $user;
    }

    public function update(User $user, Request $request)
    {
        $rules = User::rules($user);
        $attrs = User::attributes();
        $operator = Auth::user();
        $user->updated_by = $operator->id;

        DB::beginTransaction();
        try {
            $this->validate($request->all(), $rules, $attrs);
            $this->save($user, $request);

            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }
        return $user;
    }

    public function delete(User $user)
    {
        $operator = Auth::user();

        DB::beginTransaction();
        try {
            $user->delete();
            $user->deleted_by = $operator->id;
            $user->updated_by = $operator->id;
            $user->save();

            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }

        return true;
    }

    public function save(User $user, Request $request)
    {
        $user->fill(array_filter($request->input('account')));
        $user->save();
        $this->saveAvatar($user, $request->file('account.avatar'));

        return $user;
    }

    private function saveAvatar(User $user, $file)
    {
        if ($file) {
            $folder = User::PATH . $user->id . '/avatar/';
            if (Storage::exists($folder)) {
                Storage::deleteDirectory($folder);
            }
            $path = Storage::putFile(User::PATH . $user->id . '/avatar', $file);
            $user->avatar = Storage::url($path);

            return $user->save();
        }
    }
}
