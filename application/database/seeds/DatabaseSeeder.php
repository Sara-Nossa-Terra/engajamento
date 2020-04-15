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
        // $this->call(UsersTableSeeder::class);
        \App\Models\User::create([
            'tx_nome'     => 'Admin Engajamento',
            'email'    => 'admin@admin.com',
            'password'    => bcrypt(123),
            'dt_nascimento'   => date('Y-m-d'),
            'bol_ativo'   => 'A',
        ]);
    }
}
