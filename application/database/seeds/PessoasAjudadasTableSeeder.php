<?php

use Illuminate\Database\Seeder;
use App\Models\PessoasAjudadas;

class PessoasAjudadasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pessoas Ajudadas
        PessoasAjudadas::create([
            'tx_nome'       => 'João',
            'dt_nascimento' => '2001-02-25',
            'nu_telefone'   => '(61)9.9293-2527',
            'lider_id'      => '1'
        ]);

        PessoasAjudadas::create([
            'tx_nome'       => 'Maria',
            'dt_nascimento' => '2002-09-14',
            'nu_telefone'   => '(61)9.8773-3020',
            'lider_id'      => '1'
        ]);

        PessoasAjudadas::create([
            'tx_nome'       => 'José',
            'dt_nascimento' => '2003-12-25',
            'nu_telefone'   => '(61)9.9238-5779',
            'lider_id'      => '1'
        ]);

        PessoasAjudadas::create([
            'tx_nome'       => 'Marcos',
            'dt_nascimento' => '2002-08-05',
            'nu_telefone'   => '(61)9.8449-9552',
            'lider_id'      => '1'
        ]);

        PessoasAjudadas::create([
            'tx_nome'       => 'Patricia',
            'dt_nascimento' => '2005-03-28',
            'nu_telefone'   => '(61)9.8457-2551',
            'lider_id'      => '2'
        ]);

        PessoasAjudadas::create([
            'tx_nome'       => 'Aline',
            'dt_nascimento' => '2001-09-05',
            'nu_telefone'   => '(61)9.9237-2881',
            'lider_id'      => '2'
        ]);

        PessoasAjudadas::create([
            'tx_nome'       => 'Roberto',
            'dt_nascimento' => '2005-11-19',
            'nu_telefone'   => '(61)9.8442-2737',
            'lider_id'      => '2'
        ]);
    }
}
