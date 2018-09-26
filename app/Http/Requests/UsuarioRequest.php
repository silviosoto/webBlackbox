<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'id' => 'required|digits:10|unique:users',
            'name' => 'required|string|max:12',
            'Apellidos' => 'required|string|max:35',
            'email' => 'email|max:35|required',
            'password' => 'required|alpha_num|max:35|min:7',
            'Telefono' => 'required|numeric|digits:10',
            'rol' => 'required|string'
        ];
    }
}
