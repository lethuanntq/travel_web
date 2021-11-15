<?php


namespace App\Services;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AccountService extends BaseService
{
    public function store(Request $request)
    {
        $rules = User::rules();
        $attrs = User::attributes();
        DB::beginTransaction();
        try {
        $this->validate($request->all(), $rules, $attrs);
        $user = new User();
        $this->save($user, $request);
        DB::commit();
        }catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }

        return $user;
    }

    public function update(User $user, Request $request)
    {
        $rules = User::rules();
        $attrs = User::attributes();

        DB::beginTransaction();
        try {
        $this->validate($request->all(), $rules, $attrs);
        $this->save($user, $request);
        DB::commit();
        }catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }
        return $user;
    }

    public function save(User $user, Request $request)
    {

        $user->name = $request->input('account.name');
        $user->email = $request->input('account.email');
        $user->phone_number = $request->input('account.phone_number');
        $user->password = bcrypt($request->input('account.password'));
        $user->role = $request->input('account.role');
        $user->active = $request->input('account.active') ?? User::INACTIVE;
        $user->save();
    }

    public function validate($data = [], $rules = [], $attr = [])
    {
        $validator = Validator::make($data, $rules, [], $attr);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return true;
    }

    public function delete(User $user)
    {
        DB::beginTransaction();
        try{
            $user->delete();
            DB::commit();
        }catch(Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }

        return true;
    }
}
