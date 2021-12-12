<?php

namespace App\Models;

class Setting extends BaseModel
{
    public static function rules()
    {
        return [
            'setting.phone_number' => 'required|max:255',
            'setting.hot_line' => 'required|max:255',
            'setting.support_email' => 'required|max:255|email',
            'setting.headquarters' => 'required|max:255',
            'setting.branch_1' => 'required|max:255',
            'setting.branch_2' => 'nullable|max:255',
            'setting.website' => 'required|max:255',
        ];
    }

    public static function attributes()
    {
        return [
            'setting.phone_number' => 'phone number',
            'setting.hot_line' => 'hot line',
            'setting.support_email' => 'support email',
            'setting.headquarters' => 'headquarters',
            'setting.branch_1' => 'branch 1',
            'setting.branch_2' => 'branch 2',
            'setting.website' => 'website',
        ];
    }
}
