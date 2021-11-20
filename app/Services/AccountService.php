<?php


namespace App\Services;

use App\Models\Image;
use Exception;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AccountService extends BaseService
{
    public function store(Request $request)
    {
        $rules = User::rules();
        $attrs = User::attributes();
        $datas = $request->all()['account'];
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
        $data = $request->all()['account'];
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone_number = $data['phone_number'];
        $user->password = bcrypt($data['password']);
        $user->role = $data['role'];
        $user->active =$data['active']  ?? User::INACTIVE;
        $user->save();

        if (isset($data['avatar'])) {
            $this->storeFile($data['avatar'] , $user);
        }


        return $user;
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

    public function storeFile(UploadedFile $file, User $user)
    {
        if ($file->move('avatar', $file->getClientOriginalName())) {
                $image =  Image::query()->where('user_id', $user->id)->first() ?? new Image();
                $image->user_id = $user->id;
                $image->path_image = $file->getClientOriginalName();

                return $image->save();
        };

        return false;
    }
}
