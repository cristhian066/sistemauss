<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'vehiculo_id' => 'required|exists:vehiculos,id',
                    'fecha' => 'required|date_format:Y-m-d',
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'vehiculo_id' => 'required|exists:vehiculos,id',
                    'fecha' => 'required|date_format:Y-m-d',
                ];
            default:
                return [];
        }
    }
}
