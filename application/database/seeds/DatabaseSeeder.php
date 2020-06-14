<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Líderes/Usuários
        \App\Models\User::create([
            'tx_nome'     => 'Admin Engajamento',
            'email'    => 'admin@admin.com',
            'password'    => bcrypt(123),
            'dt_nascimento'   => '1991-01-01',
            'bol_ativo'   => 'A',
        ]);
        
        \App\Models\User::create([
            'tx_nome'     => 'Daniel',
            'email'    => 'daniel@gmail.com',
            'password'    => bcrypt(123),
            'dt_nascimento'   => '1992-05-23',
            'bol_ativo'   => 'A',
        ]);

        // Atividades
        \App\Models\Atividades::create([
            'tx_nome'   => 'Mensagem',
            'dt_dia'    => '2020-06-01 19:00:00'
        ]);
        
        \App\Models\Atividades::create([
            'tx_nome'   => 'Ligação',
            'dt_dia'    => '2020-06-02 20:30:00'
        ]);
        
        \App\Models\Atividades::create([
            'tx_nome'   => 'Visita',
            'dt_dia'    => '2020-06-04 19:30:00'
        ]);
        
        \App\Models\Atividades::create([
            'tx_nome'   => 'Célula',
            'dt_dia'    => '2020-06-06 17:00:00'
        ]);
        
        \App\Models\Atividades::create([
            'tx_nome'   => 'Culto',
            'dt_dia'    => '2020-06-06 18:00:00'
        ]);
        
        \App\Models\Atividades::create([
            'tx_nome'   => 'Culto',
            'dt_dia'    => '2020-06-07 18:00:00'
        ]);
        
        // Pessoas Ajudadas
        \App\Models\PessoasAjudadas::create([
            'tx_nome' => 'João',
            'dt_nascimento' => '2001-02-25',
            'nu_telefone' => '(61)9.9293-2527',
            'lider_id' => '1'
        ]);
        
        \App\Models\PessoasAjudadas::create([
            'tx_nome' => 'Maria',
            'dt_nascimento' => '2002-09-14',
            'nu_telefone' => '(61)9.8773-3020',
            'lider_id' => '1'
        ]);
        
        \App\Models\PessoasAjudadas::create([
            'tx_nome' => 'José',
            'dt_nascimento' => '2003-12-25',
            'nu_telefone' => '(61)9.9238-5779',
            'lider_id' => '1'
        ]);
        
        \App\Models\PessoasAjudadas::create([
            'tx_nome' => 'Marcos',
            'dt_nascimento' => '2002-08-05',
            'nu_telefone' => '(61)9.8449-9552',
            'lider_id' => '1'
        ]);
        
        \App\Models\PessoasAjudadas::create([
            'tx_nome' => 'Patricia',
            'dt_nascimento' => '2005-03-28',
            'nu_telefone' => '(61)9.8457-2551',
            'lider_id' => '2'
        ]);
        
        \App\Models\PessoasAjudadas::create([
            'tx_nome' => 'Aline',
            'dt_nascimento' => '2001-09-05',
            'nu_telefone' => '(61)9.9237-2881',
            'lider_id' => '2'
        ]);
        
        \App\Models\PessoasAjudadas::create([
            'tx_nome' => 'Roberto',
            'dt_nascimento' => '2005-11-19',
            'nu_telefone' => '(61)9.8442-2737',
            'lider_id' => '2'
        ]);
        
        // Revisão de Vidas
        \App\Models\Revisao::create([
            'dt_revisao' => '2020-08-20'
        ]);
        
        \App\Models\Revisao::create([
            'dt_revisao' => '2020-10-20'
        ]);
        
    }
}
