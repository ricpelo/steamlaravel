<?php

use App\Models\Cliente;
use Illuminate\Http\Request;
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
        'clientes' => Cliente::all(),
    ]);
});

Route::get('/clientes/create', function () {
    return view('clientes.create');
    // Cliente::create([
    //     'dni' => '3333',
    //     'nombre' => 'Antonio',
    //     'apellidos' => 'Martínez',
    //     'direccion' => 'Calle Larga, 999',
    //     'codpostal' => 11540,
    //     'telefono' => '756756756',
    // ]);
});

Route::post('/clientes/create', function (Request $request) {
    $validated = $request->validate([
        'dni' => 'required|max:9|unique:clientes',
        'nombre' => 'required|max:255',
        'apellidos' => 'nullable|max:255',
        'direccion' => 'nullable|max:255',
        'codpostal' => 'nullable|numeric|decimal:0|digits:5',
        'telefono' => 'nullable|max:255',
    ]);
    Cliente::create($validated);
    return redirect('/clientes');
});

Route::delete('/clientes/borrar/{cliente}', function (Cliente $cliente) {
    $cliente->delete();
    return redirect('/clientes');
});
