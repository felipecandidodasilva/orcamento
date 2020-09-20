<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            [
                'description' => 'Não Enviado'
            ],
            [
                'description' => 'Enviado'
            ],
            [
                'description' => 'Autorizado'
            ],
            [
                'description' => 'Negado'
            ],
            [
                'description' => 'Cancelado'
            ],
             [
                'description' => 'Concluído'
            ],
        ]);
    }
}
