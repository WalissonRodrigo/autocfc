<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\AlunoRequest as StoreRequest;
use App\Http\Requests\AlunoRequest as UpdateRequest;
use App\Models\Pessoa;
use Prologue\Alerts\Facades\Alert;

/**
 * Class PessoaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class AlunoCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        /**
         * Para usar a herança de Aluno com pessoas é atribuido Pessoa 
         * para carregar a maior dos campos automáticamente.
         * No entanto é adicionado os dados de aluno junto do formulário.
         */

        $this->crud->setModel('App\Models\Pessoa');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/aluno');
        $this->crud->setEntityNameStrings('aluno', 'alunos');

        $this->crud->allowAccess('show');
        $this->crud->enableExportButtons();

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();
        $this->crud->addColumns([
            [
                'name' => 'aluno.categoria_cnh',
                'label' => 'Categoria da CNH Pretendida',
                'model' => 'App\Models\Aluno',
                'entity' => 'aluno',
                'type' => 'text'
            ], [
                'name' => 'aluno.numero_cnh',
                'label' => 'Número da CNH (Se for Adição)',
                'type' => 'text',
                'entity' => 'aluno',
                'model' => 'App\Models\Aluno'
            ], [
                'name' => 'aluno.data_primeira_cnh',
                'label' => 'Data da Primeira CNH (Se houver)',
                'type' => 'date_picker',
                'date_picker_options' => [
                    'todayBtn' => true,
                    'format' => 'dd/mm/yyyy',
                    'language' => 'pt-BR'
                ],
                'entity' => 'aluno',
                'model' => 'App\Models\Aluno'
            ]
        ]);

        $this->crud->modifyField("nascimento", [
            'name' => 'nascimento',
            'label' => 'Data de Nascimento',
            'type' => 'date',
        ]);
        $this->crud->modifyField("data_expedicao_rg", [
            'name' => 'data_expedicao_rg',
            'label' => 'Data de Expedição do RG',
            'type' => 'date',
        ]);
        $this->crud->modifyField("sexo", [
            // Enum
            'name' => 'sexo',
            'label' => 'Sexo',
            'type' => 'enum'
        ]);
        $this->crud->modifyField("endereco", [
            // Enum
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
            'type' => 'cpf',
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
        //Adiciona os dados da Model Aluno para o CRUD
        $this->crud->addFields([
            [
                'name' => 'categoria_cnh',
                'label' => 'Categoria da CNH Pretendida',
                'model' => 'App\Models\Aluno',
                'entity' => 'aluno',
                'type' => 'select_from_array',
                'options' => ['ACC' => 'ACC', 'A' => 'A', 'AB' => 'AB', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E'],
                'allows_null' => false,
                'allows_multiple' => false
            ], [
                'name' => 'numero_cnh',
                'label' => 'Número da CNH (Se for Adição)',
                'type' => 'text',
                'entity' => 'aluno',
                'model' => 'App\Models\Aluno'
            ], [
                'name' => 'data_primeira_cnh',
                'label' => 'Data da Primeira CNH (Se houver)',
                'type' => 'date',
                'entity' => 'aluno',
                'model' => 'App\Models\Aluno'
            ]
        ]);

        // add asterisk for fields that are required in PessoaRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
        //add queries structs for filter data in list
        $this->crud->addClause('whereHas', 'aluno', function ($aluno) {
            return $aluno;
        });
    }

    public function show($id)
    {
        $content = parent::show($id);
        return $content;
    }

    public function store(StoreRequest $request)
    {
        // custom store is need because aluno dont have ID autoincrement and set id manual is need;
        $pessoa = Pessoa::create($request->toArray());
        $pessoa->aluno()->create($request->toArray());
        // show a success message
        Alert::success(trans('backpack::crud.insert_success'))->flash();
        // save the redirect choice for next time
        $this->setSaveAction();

        return $this->performSaveAction($pessoa->getKey());

        //return $redirect_location;
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
