<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'placa' => 'required|unique:vehiculo|max:10', // La placa es obligatoria y única
            'modelo' => 'required|max:255', // El modelo es obligatorio
            'propietario' => 'required|max:255', // El propietario es obligatorio
        ];
    }
}
