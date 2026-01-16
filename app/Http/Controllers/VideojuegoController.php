<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideojuegoRequest;
use App\Http\Requests\UpdateVideojuegoRequest;
use App\Models\Desarrolladora;
use App\Models\Genero;
use App\Models\Videojuego;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class VideojuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('videojuegos.index', [
            'videojuegos' => Videojuego::with('desarrolladora')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Videojuego::class);
        // Gate::authorize('videojuego-create');
        // if (Gate::denies('videojuego-create')) {
        //     return redirect()
        //         ->route('videojuegos.index')
        //         ->with('fallo', 'No tienes permiso para crear videojuegos.');
        //     // abort(403, 'No tienes permiso para crear videojuegos.');
        // }
        // if (!Gate::allows('videojuego-create')) {
        //     abort(403, 'No tienes permiso para crear videojuegos.');
        // }
        // if (!Auth::user()->can('videojuego-create')) {
        //     abort(403, 'No tienes permiso para crear videojuegos.');
        // }
        return view('videojuegos.create', [
            'desarrolladoras' => Desarrolladora::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVideojuegoRequest $request)
    {
        Videojuego::create($request->validated());
        return redirect()->route('videojuegos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Videojuego $videojuego)
    {
        // $otros_generos = Genero::whereNotIn('id', $videojuego->generos->pluck('id'))->get();
        $otros_generos = Genero::whereDoesntHave('videojuegos', function (Builder $q) use ($videojuego) {
            $q->where('videojuego_id', $videojuego->id);
        })->orderBy('genero')->get();
        return view('videojuegos.show', [
            'videojuego' => $videojuego,
            'otros_generos' => $otros_generos,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videojuego $videojuego)
    {
        Gate::authorize('update', $videojuego);
        return view('videojuegos.edit', [
            'videojuego' => $videojuego,
            'desarrolladoras' => Desarrolladora::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideojuegoRequest $request, Videojuego $videojuego)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videojuego $videojuego)
    {
        Gate::authorize('delete', $videojuego);
        $videojuego->delete();
        return redirect()
            ->route('videojuegos.index')
            ->with('exito', 'Videojuego eliminado');
    }

    public function agregar_genero(Request $request, Videojuego $videojuego)
    {
        $genero = Genero::findOrFail($request->genero_id);
        if ($videojuego->generos()->where('id', $genero->id)->exists())
        {
            return back()->withErrors(['genero_id' => 'El videojuego ya tiene ese género.']);
        }
        $videojuego->generos()->attach($genero);
        return redirect()
            ->route('videojuegos.show', $videojuego)
            ->with('exito', 'Género agregado');
    }

    public function quitar_genero(Videojuego $videojuego, Genero $genero)
    {
        if (!$videojuego->generos()->where('id', $genero->id)->exists()) {
            return back()->withErrors(['genero_id' => 'El videojuego no tiene ese género.']);
        }
        $videojuego->generos()->detach($genero);
        return redirect()
            ->route('videojuegos.show', $videojuego)
            ->with('exito', 'Género quitado');
    }
}
