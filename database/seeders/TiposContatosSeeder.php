<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposContatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_contatos')->insert([
            [
                'descricao' => 'Celular',
            ],
            [
                'descricao' => 'Telefone',
            ],
            [
                'descricao' => 'E-mail',
            ],
        ]);
    }
}
