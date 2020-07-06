<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'email' => 'admin@autoescola.com',
                'name' => 'Administrador',
                'password' => bcrypt("admin@cfc"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'email' => 'diretor@autoescola.com',
                'name' => 'Diretor',
                'password' => bcrypt("diretor@cfc"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'email' => 'instrutor@autoescola.com',
                'name' => 'Instrutor',
                'password' => bcrypt("instrutor@cfc"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        DB::table('users')->delete();
        User::insert($data);
        //Load Users for add Roles (Perfil) to all
        $userDiretorAdmin = User::where('email', '=', 'admin@autoescola.com')->first();
        $userDiretorAdmin->assignRole('Diretor');
        $userDiretorCfc = User::where('email', '=', 'diretor@autoescola.com')->first();
        $userDiretorCfc->assignRole('Diretor');
        $userInstrutor = User::where('email', '=', 'instrutor@autoescola.com')->first();
        $userInstrutor->assignRole('Instrutor');
    }
}
