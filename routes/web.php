<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/lideres/{id}/destroy', 'UserController@destroy')->name('lideres.delete');
    Route::resources([
        'lideres' => 'UserController',
    ]);

});
