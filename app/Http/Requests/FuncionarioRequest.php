<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioRequest extends FormRequest
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
            'nome_completo' => 'required|min:4|max:191',
            'nome_pai' => 'required|min:4|max:191',
            'nome_mae' => 'required|min:4|max:191',
            'naturalidade' => 'required|min:4|max:191',
            'nacionalidade' => 'sometimes|min:3|max:100',
            'sexo' => 'required|min:8|max:9',
            'numero_cpf' => 'required|min:14|max:15',
            'numero_rg' => 'required|min:5|max:12',
            'nascimento' => 'required|date',
            'data_expedicao_rg' => 'required|date',
            'endereco' => 'sometimes|min:4|max:191',
            'cidade' => 'sometimes|min:4|max:100',
            'cep' => 'sometimes|min:8|max:9',
            'comentarios' => 'sometimes|min:4|max:191',
            'email' => 'sometimes|email|max:191',
            'telefone' => 'sometimes|min:14|max:15',
            'carteira_trabalho' => 'required|max:14',
            'pis' => 'required|max:14'
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
            'nome_completo' => 'Nome Completo',
            'nome_pai' => 'Nome do Pai',
            'nome_mae' => 'Nome da Mãe',
            'naturalidade' => 'Naturalidade',
            'nacionalidade' => 'Nacionalidade',
            'sexo' => 'Sexo',
            'numero_cpf' => 'Números do CPF',
            'numero_rg' => 'RG Completo',
            'nascimento' => 'Data de Nascimento',
            'data_expedicao_rg' => 'Data de Expedição do RG',
            'endereco' => 'Endereço Completo',
            'cidade' => 'Cidade',
            'cep' => 'CEP',
            'comentarios' => 'Comentários',
            'email' => 'E-mail',
            'telefone' => 'Telefone',
            'carteira_trabalho' => 'Carteira de Trabalho',
            'pis' => 'Número PIS/PASEP',
            'numero_cnh' => 'Número CNH',
            'matricula_curso_instrutor' => 'Número da Matricula do Curso de Instrutor',
            'primeira_cnh' => 'Data da Primeira CNH',
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
