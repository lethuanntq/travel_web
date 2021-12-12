<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\SettingService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function edit()
    {
        $setting = Setting::first();

        return view('management.settings.edit', [
            'setting' => $setting,
        ]);
    }

    public function update(Setting $setting, Request $request)
    {
        $this->settingService->update($setting, $request);

        return redirect()->route('management.setting.edit')->with('message', 'Cập nhật thành công!');
    }
}
