<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PerfisTableSeeder extends Seeder
{
    public function run()
    {
        $diretor = Role::create([
            'name' => 'Diretor',
            'guard_name' => 'web'
        ]);
        $diretor->givePermissionTo('Gerir Usuários');
        $diretor->givePermissionTo('Gerir Perfis');
        $diretor->givePermissionTo('Gerir Permissões');
        $diretor->givePermissionTo('Gerir Salas');
        $diretor->givePermissionTo('Gerir Veículos');
        $diretor->givePermissionTo('Gerir Funcionários');
        $diretor->givePermissionTo('Despesas Veiculares');
        $diretor->givePermissionTo('Gerir Alunos');
        $diretor->givePermissionTo('Gerir Aulas');

        $instrutor = Role::create([
            'name' => 'Instrutor',
            'guard_name' => 'web'
        ]);
        $instrutor->givePermissionTo('Despesas Veiculares');
        $instrutor->givePermissionTo('Gerir Alunos');
        $instrutor->givePermissionTo('Gerir Aulas');

        $atendente = Role::create([
            'name' => 'Atendente',
            'guard_name' => 'web'
        ]);
        $atendente->givePermissionTo('Gerir Alunos');
        $atendente->givePermissionTo('Gerir Aulas');
    }
}
