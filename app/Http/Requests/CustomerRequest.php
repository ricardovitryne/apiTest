<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function rules(): array
    {
        switch ($this->method()) {
            case "POST" :
                return [
                    'name'      => 'required|string|min:3|max:100',
                    'phone'     => 'required|string',
                    'cpf'       => 'required|string|unique:customers,cpf',
                    'car_plate' => 'required|string',
                ];

            case "PUT" :
                return [
                    'name'      => 'sometimes|string|min:3|max:100',
                    'phone'     => 'sometimes|string',
                    'cpf'       => 'sometimes|string|unique:customers,cpf,'.$this->customer->id,
                    'car_plate' => 'sometimes|string',
                ];
                break;
        }
    }

    public function authorize(): bool
    {
        return true;
    }
}
