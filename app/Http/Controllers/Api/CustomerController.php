<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    public function index()
    {
        try {
            $customers = Customer::paginate();

            return CustomerResource::collection($customers);
        } catch (\Exception $ex) {
            return response()->json("Bad Request", 400);
        }
    }

    /**
     * @param Customer $customer
     * @return CustomerResource|JsonResponse
     */
    public function show(Customer $customer)
    {
        try {
            return new CustomerResource($customer);
        } catch (\Exception $ex) {
            return response()->json("Bad Request", 400);
        }
    }

    /**
     * @param CustomerRequest $request
     * @return CustomerResource|JsonResponse
     */
    public function store(CustomerRequest $request)
    {
        try {
            $customer = Customer::query()
                                ->create($request->validated());

            return new CustomerResource($customer);
        } catch (\Exception $ex) {
            return response()->json("Bad Request", 400);
        }
    }

    /**
     * @param CustomerRequest $request
     * @param Customer $customer
     * @return CustomerResource|JsonResponse
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        if (!$request->validated()) {
            return response()->json("Nothing to update", 400);
        }

        try {
            $customer->update($request->validated());

            return new CustomerResource($customer);
        } catch (\Exception $ex) {
            return response()->json("Bad Request", 400);
        }
    }

    /**
     * @param Customer $customer
     * @return JsonResponse
     */
    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();

            return response()->json(["message" => "Deleted.", "error" => ""], 200);
        } catch (\Exception $ex) {
            return response()->json(["message" => "Bad Request", "error" => 400], 400);
        }
    }

    public function searchCarPlate($numero)
    {
        if (!is_numeric($numero)) {
            return response()->json(["message" => "Is not number valid", "error" => 400], 400);
        }

        if (($numero < 0) || ($numero > 9)) {
            return response()->json(["message" => "Out of range (0 - 9)", "error" => 400], 400);
        }

        try {

            $customer = Customer::query()
                                ->where('car_plate', 'like', '%' . $numero)
                                ->paginate();

            return CustomerResource::collection($customer);
        } catch (\Exception $ex) {
            return response()->json(["message" => "Bad Request", "error" => 400], 400);
        }
    }
}
