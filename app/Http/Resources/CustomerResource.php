<?php

namespace App\Http\Resources;

use App\Models\Customer;
use Illuminate\Http\Resources\Json\JsonResource;
use Vinkla\Hashids\Facades\Hashids;

/** @mixin \App\Models\Customer */
class CustomerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'       => Hashids::connection(Customer::class)->encode($this->id),
            'nome'     => $this->name,
            'telefone' => $this->phone,
            'cpf'      => $this->cpf,
            'placa'    => $this->car_plate,
        ];
    }
}
