<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\VeiculoRequest as StoreRequest;
use App\Http\Requests\VeiculoRequest as UpdateRequest;

/**
 * Class VeiculoCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class VeiculoCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Veiculo');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/veiculo');
        $this->crud->setEntityNameStrings('veiculo', 'veiculos');
        $this->crud->enableExportButtons();

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();
        $this->crud->modifyField(
            'modelo',
            [
                'name' => 'modelo',
                'label' => 'Modelo do Veículo',
                'type' => 'text',
                'attributes' => [
                    'maxlength' => '45',
                ]
            ]
        );
        $this->crud->modifyField(
            'categoria_cnh',
            [
                'name' => 'categoria_cnh',
                'label' => 'Categoria do Veículo',
                'type' => 'enum'
            ]
        );
        $this->crud->modifyField(
            'placa',
            [
                'name' => 'placa',
                'label' => 'Placa',
                'type' => 'text',
                'attributes' => [
                    'maxlength' => '7',
                ]
            ]
        );
        $this->crud->modifyField(
            'chassi',
            [
                'name' => 'chassi',
                'label' => 'Chassi',
                'type' => 'text',
                'attributes' => [
                    'maxlength' => '17',
                ]
            ]
        );
        $this->crud->modifyField(
            'cor',
            [
                'name' => 'cor',
                'label' => 'Cor do Veículo',
                'type' => 'text',
                'attributes' => [
                    'maxlength' => '20',
                ]
            ]
        );

        // add asterisk for fields that are required in VeiculoRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
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
