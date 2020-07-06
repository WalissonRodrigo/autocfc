<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\FuncionarioRequest as StoreRequest;
use App\Http\Requests\FuncionarioRequest as UpdateRequest;
use App\Models\Pessoa;
use Prologue\Alerts\Facades\Alert;

/**
 * Class FuncionarioCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class FuncionarioCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Pessoa');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/funcionario');
        $this->crud->setEntityNameStrings('funcionário', 'funcionários');

        $this->crud->allowAccess('show');
        $this->crud->enableExportButtons();

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();
        /// Fields for show in datatablejs and button show
        $this->crud->addColumns([
            [
                'name' => 'funcionario.carteira_trabalho',
                'label' => 'Número da carteira de trabalho',
                'type' => 'text',
                'entity' => 'funcionario',
                'model' => 'App\Models\Funcionario',
            ], [
                'name' => 'funcionario.pis',
                'label' => 'Número do pis',
                'type' => 'text',
                'entity' => 'funcionario',
                'model' => 'App\Models\Funcionario',
            ], [
                'name' => 'instrutor.categoria_cnh',
                'label' => 'Categoria da cnh',
                'model' => 'App\Models\Instrutor',
                'entity' => 'instrutor',
                'type' => 'text',
            ], [
                'name' => 'instrutor.matricula_curso_instrutor',
                'label' => 'Matricula do curso de instrutor',
                'type' => 'text',
                'entity' => 'instrutor',
                'model' => 'App\Models\Instrutor',
            ], [
                'name' => 'instrutor.numero_cnh',
                'label' => 'Número da cnh',
                'type' => 'text',
                'entity' => 'instrutor',
                'model' => 'App\Models\Instrutor',
            ], [
                'name' => 'instrutor.primeira_cnh',
                'label' => 'Data da primeira cnh',
                'type' => 'date_picker',
                'date_picker_options' => [
                    'todayBtn' => true,
                    'format' => 'dd/mm/yyyy',
                    'language' => 'pt-BR'
                ],
                'entity' => 'instrutor',
                'model' => 'App\Models\Instrutor'
            ]
        ]);
        /// Fields from CRUD
        $this->crud->modifyField("nascimento", [
            'name' => 'nascimento',
            'label' => 'Data de Nascimento',
            'type' => 'date'
        ]);
        $this->crud->modifyField("data_expedicao_rg", [
            'name' => 'data_expedicao_rg',
            'label' => 'Data de Expedição do RG',
            'type' => 'date'
        ]);
        $this->crud->modifyField("sexo", [
            // Enum
            'name' => 'sexo',
            'label' => 'Sexo',
            'type' => 'enum'
        ]);
        $this->crud->modifyField("endereco", [
            // Recupera da internet 
            'name' => 'endereco',
            'label' => 'Endereço Completo',
            'type' => 'address'
        ]);
        $this->crud->modifyField("telefone", [
            // telefone possui mascara
            'name' => 'telefone',
            'label' => 'Telefone',
            'type' => 'phone'
        ]);
        $this->crud->modifyField("numero_cpf", [
            // cpf possui mascara
            'name' => 'numero_cpf',
            'label' => 'Numero cpf',
            'type' => 'cpf'
        ]);
        $this->crud->modifyField("numero_rg", [
            // rg possui mascara
            'name' => 'numero_rg',
            'label' => 'Numero rg',
            'type' => 'textnumeric',
            'max' => '12'

        ]);
        $this->crud->modifyField("cep", [
            // cep possui mascara
            'name' => 'cep',
            'label' => 'CEP',
            'type' => 'cep'
        ]);
        //Adiciona os dados da Model de Funcionário para o CRUD
        $this->crud->addFields([
            [
                'name' => 'carteira_trabalho',
                'label' => 'Número da carteira de trabalho',
                'type' => 'textnumeric',
                'max' => '14',
                'entity' => 'funcionario',
                'model' => 'App\Models\Funcionario',
            ], [
                'name' => 'pis',
                'label' => 'Número do pis',
                'type' => 'textnumeric',
                'max' => '14',
                'entity' => 'funcionario',
                'model' => 'App\Models\Funcionario',
            ]
        ]);
        //Adiciona os dados da Model de Instrutor para o CRUD
        $this->crud->addFields([
            [
                'name' => 'categoria_cnh',
                'label' => 'Categoria da cnh',
                'model' => 'App\Models\Instrutor',
                'entity' => 'instrutor',
                'type' => 'select_from_array',
                'options' => ['ACC' => 'ACC', 'A' => 'A', 'AB' => 'AB', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E'],
                'allows_null' => false,
                'allows_multiple' => false
            ], [
                'name' => 'matricula_curso_instrutor',
                'label' => 'Matricula do curso de instrutor',
                'type' => 'textnumeric',
                'max' => '16',
                'entity' => 'instrutor',
                'model' => 'App\Models\Instrutor',
            ], [
                'name' => 'numero_cnh',
                'label' => 'Número da cnh',
                'type' => 'textnumeric',
                'max' => '16',
                'entity' => 'instrutor',
                'model' => 'App\Models\Instrutor',
            ], [
                'name' => 'primeira_cnh',
                'label' => 'Data da primeira cnh',
                'type' => 'date',
                'entity' => 'instrutor',
                'model' => 'App\Models\Instrutor'
            ]
        ]);

        // add asterisk for fields that are required in FuncionarioRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
        //add queries structs for filter data in list
        $this->crud->addClause('whereHas', 'funcionario', function ($funcionario) {
            return $funcionario;
        });
    }

    public function store(StoreRequest $request)
    {
        $pessoa = Pessoa::create($request->toArray());
        $pessoa->funcionario()->create($request->toArray());
        if (isset($request->matricula_curso_instrutor) && strlen(trim($request->matricula_curso_instrutor) > 0))
            $pessoa->instrutor()->create($request->toArray());
        // show a success message
        Alert::success(trans('backpack::crud.insert_success'))->flash();
        // save the redirect choice for next time
        $this->setSaveAction();

        return $this->performSaveAction($pessoa->getKey());
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
