<?php


namespace App\Services;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Customer;

class CustomerService extends BaseService
{
    public function store(Request $request)
    {
        $rules = Customer::rules();
        $attrs = Customer::attributes();
        DB::beginTransaction();
        try {
            $this->validate($request->all(), $rules, $attrs);
            $customer = new Customer();
            $this->save($customer, $request);
            DB::commit();
        }catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }

        return $customer;
    }

    public function update(Customer $customer, Request $request)
    {
        $rules = Customer::rules();
        $attrs = Customer::attributes();
        DB::beginTransaction();
        try {
            $this->validate($request->all(), $rules, $attrs);
            $this->save($customer, $request);
            DB::commit();
        }catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }

        return $customer;
    }

    public function save(Customer $customer, Request $request)
    {
        $operator = Auth::user();
        $customer->user_id = $request->input('customer.user_id');
        $customer->tour_id = $request->input('customer.tour_id');
        $customer->number_booked = $request->input('customer.number_booked');
        $customer->note = $request->input('customer.note');
        $customer->status = $request->input('customer.status');
        $customer->created_by = $operator->id;
        $customer->updated_by = $operator->id;
        $customer->save();
    }


    public function delete(Customer $customer)
    {
        DB::beginTransaction();
        try{
            $customer->delete();
            DB::commit();
        }catch(Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }

        return true;
    }
}
