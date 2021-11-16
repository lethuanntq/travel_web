<?php


namespace App\Services;


use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class BaseService
{
    public function validate($data = [], $rules = [], $attr = [])
    {
        $validator = Validator::make($data, $rules, [], $attr);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return true;
    }
}
