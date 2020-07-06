<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SalaRequest as StoreRequest;
use App\Http\Requests\SalaRequest as UpdateRequest;

/**
 * Class SalaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SalaCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Sala');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/sala');
        $this->crud->setEntityNameStrings('sala', 'salas');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();
        $this->crud->modifyField(
            'nome',
            [
                'name' => 'nome',
                'label' => 'Nome da Sala',
                'type' => 'text',
                'attributes' => [
                    'maxlength' => '50',
                ]
            ]
        );

        $this->crud->modifyField(
            'capacidade',
            [
                'name' => 'capacidade',
                'label' => 'Capacidade da Sala',
                'type' => 'textnumeric',
                'max' => '9'
            ]
        );
        // add asterisk for fields that are required in SalaRequest
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
