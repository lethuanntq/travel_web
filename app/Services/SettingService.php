<?php

namespace App\Services;

use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SettingService extends BaseService
{
    public function update(Setting $setting, Request $request)
    {
        $rules = Setting::rules();
        $attrs = Setting::attributes();
        $operator = Auth::user();
        $setting->updated_by = $operator->id;

        DB::beginTransaction();
        try {
            $this->validate($request->all(), $rules, $attrs);
            $setting->fill($request->input('setting'));
            $setting->save();

            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }
    }
}
