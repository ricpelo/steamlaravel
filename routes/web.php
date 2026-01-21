<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\VideojuegoController;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
Route::resource('videojuegos', VideojuegoController::class)
    ->except(['index', 'show'])
    ->middleware('auth');

Route::resource('videojuegos', VideojuegoController::class)
    ->only(['index', 'show']);

Route::resource('generos', GeneroController::class)
    ->except(['index', 'show'])
    ->middleware('auth');

Route::resource('generos', GeneroController::class)
    ->only(['index', 'show']);

Route::middleware('auth')->group(function () {
    Route::post(
        '/videojuegos/{videojuego}/agregar_genero',
        [VideojuegoController::class, 'agregar_genero']
    )->name('videojuegos.agregar_genero');

    Route::delete(
        'videojuegos/{videojuego}/quitar_genero/{genero}',
        [VideojuegoController::class, 'quitar_genero']
    )->name('videojuegos.quitar_genero');

    Route::get('/profile', function () {
        return view('user.profile', [
            'user' => Auth::user(),
        ]);
    })->name('user.profile');

    Route::post('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});

Route::redirect('/', route('videojuegos.index'));

Route::get('/login', function () {
    return view('user.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended(route('user.profile'));
    }

    return back()->withErrors([
        'email' => 'Las credenciales no coinciden con nuestros registros.',
    ])->onlyInput('email');
})->name('login.perform');

Route::resource('comentarios', ComentarioController::class);

Route::get('/pruebas', function () {
    return imagen_url_relativa('ejemplo.jpg');
    // return parse_url(Storage::disk('imagenes')->url('ejemplo.jpg'), PHP_URL_PATH);
    // Storage::disk('imagenes')->url('ejemplo.jpg');
});
