<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissoesTableSeeder extends Seeder
{
    public function run()
    {
        Permission::create([
            'name' => 'Gerir Usuários',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Gerir Perfis',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Gerir Permissões',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Gerir Salas',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Gerir Veículos',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Gerir Funcionários',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Despesas Veiculares',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Gerir Alunos',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Gerir Aulas',
            'guard_name' => 'web'
        ]);
    }
}
