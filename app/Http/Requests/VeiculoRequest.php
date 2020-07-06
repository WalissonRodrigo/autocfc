<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeiculoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'modelo' => 'required|min:3|max:45',
            'categoria_cnh' => 'required',
            'placa' => 'required|min:7|max:7',
            'chassi' => 'sometimes|min:17|max:18',
            'cor' => 'sometimes|max:20',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'modelo' => 'Modelo do Veículo', 'categoria_cnh' => 'Categoria do Veículo', 'placa' => 'Placa', 'chassi' => 'Chassi', 'cor' => 'Cor do Veículo'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    // public function messages()
    // {
    //     return [
    //         //
    //     ];
    // }
}
