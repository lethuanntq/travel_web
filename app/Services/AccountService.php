<?php


namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AccountService extends BaseService
{
    public function store(Request $request)
    {
        $rules = User::rules();
        $attr = User::attributes();
        DB::beginTransaction();
//        try {
            $data = $request->all();
            $validator = Validator::make($data, $rules, [], $attr);
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }
            $user = new User();
            $user->name = $request->input('account.name');
            $user->email = $request->input('account.email');
            $user->phone_number = $request->input('account.phone_number');
            $user->password = bcrypt($request->input('account.password'));
            $user->role = $request->input('account.role');
            $user->active = $request->input('account.active') ?? User::INACTIVE;

            $user->save();
            DB::commit();
//        }catch (Exception $e) {
//            Log::error($e->getMessage());
//            DB::rollBack();
//        }


    }
}
