<?php

use App\Http\Controllers\GeneroController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\VideojuegoController;
use App\Models\Cliente;
use App\Models\Habitacion;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return redirect()->route('videojuegos.index');
// });

Route::get('/hola', function () {
    $nombre = request()->query('nombre');
    $nombre = request('nombre');
    return "Hola, $nombre";
});

Route::get('/clientes', function () {
    return view('clientes.index', [
        'clientes' => Cliente::all(),
    ]);
})->name('clientes.index');

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

Route::post('/clientes', function (Request $request) {
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

Route::put('/clientes/{cliente}', function (Cliente $cliente, Request $request) {
    $validated = $request->validate([
        'dni' => 'required|max:9|unique:clientes,dni,' . $cliente->id,
        'nombre' => 'required|max:255',
        'apellidos' => 'nullable|max:255',
        'direccion' => 'nullable|max:255',
        'codpostal' => 'nullable|numeric|decimal:0|digits:5',
        'telefono' => 'nullable|max:255',
    ]);
    $cliente->update($validated);
    return redirect('/clientes');
});

Route::delete('/clientes/{cliente}', function (Cliente $cliente) {
    $cliente->delete();
    return redirect('/clientes');
});

Route::get('/clientes/{cliente}/edit', function (Cliente $cliente) {
    return view('clientes.edit', [
        'cliente' => $cliente,
    ]);
});

// Route::get('/videojuegos', [VideojuegoController::class, 'index']);
// Route::get('/videojuegos/create', [VideojuegoController::class, 'create']);
// // ...
Route::resource('videojuegos', VideojuegoController::class);
Route::resource('generos', GeneroController::class);

Route::post(
    '/videojuegos/{videojuego}/agregar_genero',
    [VideojuegoController::class, 'agregar_genero']
)->name('videojuegos.agregar_genero');

Route::delete(
    'videojuegos/{videojuego}/quitar_genero/{genero}',
    [VideojuegoController::class, 'quitar_genero']
)->name('videojuegos.quitar_genero');

Route::redirect('/', route('videojuegos.index'));

Route::get('/profile', function () {
    return view('user.profile', [
        'user' => User::find(2),
    ]);
})->name('user.profile');

Route::resource('habitaciones', HabitacionController::class)
    ->parameters(['habitaciones' => 'habitacion']);

Route::delete('/reservas/{reserva}', function (Reserva $reserva) {
    $habitacion = $reserva->habitacion;
    $reserva->delete();
    return redirect()->route('habitaciones.show', $habitacion);
})->name('reservas.destroy');

Route::post('/reservas/{habitacion}', function (Habitacion $habitacion) {
    $fecha_entrada = request('fecha_entrada');
    $fecha_salida = request('fecha_salida');
    // dd($fecha_entrada, $fecha_salida, $habitacion);
    $res = $habitacion->whereDoesntHave('reservas', function (Builder $query) use ($fecha_entrada, $fecha_salida) {
        $query->where('fecha_entrada', '<=', $fecha_salida)
            ->where('fecha_salida', '>=', $fecha_entrada);
    })->exists();
    if (!$res) {
        return back()->with('fallo', 'No se ha podido reservar la habitación.');
    }
    $habitacion->reservas()->create([
        'fecha_entrada' => $fecha_entrada,
        'fecha_salida' => $fecha_salida,
    ]);
    return redirect()->route('habitaciones.index')
        ->with('exito', 'Se ha reservado correctamente.');
})->name('reservas.create');
