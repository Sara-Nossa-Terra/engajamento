<?php

use Illuminate\Database\Seeder;
use App\Models\Revisao;

class RevisaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Revisão de Vidas
        Revisao::create(['dt_revisao' => '2020-08-20']);
        Revisao::create(['dt_revisao' => '2020-10-20']);
    }
}
