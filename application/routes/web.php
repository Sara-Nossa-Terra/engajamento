<?php

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return view('dashboard.index');
    })->name('home');

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::get('/lideres/{id}/destroy', 'UsersController@destroy')->name('lideres.delete');
    Route::get('/pessoasajudadas/{id}/destroy', 'PessoasAjudadasController@destroy')->name('pessoasajudadas.delete');
    Route::get('/atividades/{id}/destroy', 'AtividadesController@destroy')->name('atividades.delete');
    Route::get('/revisao/{id}/destroy', 'RevisaoController@destroy')->name('revisao.delete');

    Route::resources([
        'atividades'      => 'AtividadesController',
        'lideres'         => 'UsersController',
        'pessoasajudadas' => 'PessoasAjudadasController',
        'revisao'         => 'RevisaoController',
    ]);

});
