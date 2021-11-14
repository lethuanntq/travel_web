<?php


namespace App\Services;

use Illuminate\Http\Request;

class CustomerService extends BaseService
{
    public function store(Request $request)
    {
        dd($request->all());
    }
}
