<?php

use Illuminate\Database\Seeder;

class OrcamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Model\Orcamento::class, 50)->create();
    }
}
