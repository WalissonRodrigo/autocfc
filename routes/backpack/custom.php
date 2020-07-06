<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace' => 'App\Http\Controllers\Admin',
], function () { 
    // custom admin routes
    CRUD::resource('aluno', 'AlunoCrudController');
    CRUD::resource('veiculo', 'VeiculoCrudController');
    CRUD::resource('funcionario', 'FuncionarioCrudController');
    CRUD::resource('sala', 'SalaCrudController');
}); 

// this should be the absolute last line of this file
