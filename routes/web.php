<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function () {
    $nombre = request()->query('nombre');
    $nombre = request('nombre');
    return "Hola, $nombre";
});

Route::get('/clientes', function () {
    return view('clientes.index', [
        'nombre' => 'Pepito',
    ]);
});
