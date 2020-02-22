<?php

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/lideres/{id}/destroy', 'UserController@destroy')->name('lideres.delete');
    Route::get('/pessoasajudadas/{id}/destroy', 'PessoasAjudadasController@destroy')->name('pessoasajudadas.delete');

    Route::resources([
        'lideres' => 'UserController',
        'pessoasajudadas' => 'PessoasAjudadasController',
    ]);

});
