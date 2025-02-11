<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeleadorUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required',
            'edad' => 'required',
            'peso' => 'required',
            'sexo' => 'required',
            'modalidad_id' => 'required|exists:modalidad,id',
        ];
    }
}
