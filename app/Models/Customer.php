<?php

namespace App\Models;

use App\Http\Traits\Hashidable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *  App\Models\Customer
 * @property string $name;
 * @property string $phone;
 * @property string $cpf;
 * @property string $car_plate;
 */
class Customer extends Model
{
    use HasFactory, Hashidable, SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'cpf',
        'car_plate',
    ];
}
