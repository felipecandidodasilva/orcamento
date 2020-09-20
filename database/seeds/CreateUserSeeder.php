<?php

use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'          => 'Administrador Padrão',
            'email'         => 'administrador@sistema.com.br',
            'cliente'       => false,
            'funcionario'       => true,
            'password'      => bcrypt('sistema'),
            ]);
            factory(\App\User::class, 10)->create();
    }
}
