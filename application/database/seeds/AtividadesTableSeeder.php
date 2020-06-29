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
        // Atividades
        Atividades::create(['tx_nome' => 'Mensagem', 'dt_dia' => '2020-06-01 19:00:00']);
        Atividades::create(['tx_nome' => 'Ligação', 'dt_dia' => '2020-06-02 20:30:00']);
        Atividades::create(['tx_nome' => 'Visita', 'dt_dia' => '2020-06-04 19:30:00']);
        Atividades::create(['tx_nome' => 'Célula', 'dt_dia' => '2020-06-06 17:00:00']);
        Atividades::create(['tx_nome' => 'Culto', 'dt_dia' => '2020-06-06 18:00:00']);
        Atividades::create(['tx_nome' => 'Culto', 'dt_dia' => '2020-06-07 18:00:00']);
    }
}
