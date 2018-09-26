<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MotocicletaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'placa' => 'required|min:6|max:7|alpha_num|unique:motos',
            'cilindrada' => 'required|numeric|min:2',
            'color' => 'required|string|max:20',
        ];
    }
}
