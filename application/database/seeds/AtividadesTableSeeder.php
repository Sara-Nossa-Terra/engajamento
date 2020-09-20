<?php

use Illuminate\Database\Seeder;
use App\Models\Atividades;

class AtividadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Atividades
        Atividades::create(['tx_nome' => 'Mensagem', 'dt_dia' => '2020-09-11 19:00:00']);
        Atividades::create(['tx_nome' => 'Ligação',  'dt_dia' => '2020-09-12 20:30:00']);
        Atividades::create(['tx_nome' => 'Visita',   'dt_dia' => '2020-09-14 19:30:00']);
        Atividades::create(['tx_nome' => 'Célula',   'dt_dia' => '2020-09-16 17:00:00']);
        Atividades::create(['tx_nome' => 'Culto',    'dt_dia' => '2020-09-16 18:00:00']);
        Atividades::create(['tx_nome' => 'Oração',   'dt_dia' => '2020-09-17 18:00:00']);
    }
}
