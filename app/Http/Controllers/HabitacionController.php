<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q = Habitacion::query();

        $fecha_entrada = $request->query('fecha_entrada');
        $fecha_salida = $request->query('fecha_salida');

        if ($fecha_entrada && $fecha_salida) {
            $q->whereDoesntHave('reservas', function (Builder $query) use ($fecha_entrada, $fecha_salida) {
                $query->where('fecha_entrada', '<=', $fecha_salida)
                    ->where('fecha_salida', '>=', $fecha_entrada);
            });
        }

        return view('habitaciones.index', [
            'habitaciones' => $q->get(),
            'fecha_entrada' => $fecha_entrada,
            'fecha_salida' => $fecha_salida,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('habitaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero' => 'required|numeric|unique:habitaciones,numero',
            'planta' => 'required|integer',
            'tipo' => 'required',
            'precio_noche' => 'required|numeric|decimal:2|gte:-999999.99|lte:999999.99',
        ]);
        Habitacion::create($validated);
        return redirect()->route('habitaciones.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Habitacion $habitacion)
    {
        return view('habitaciones.show', [
            'habitacion' => $habitacion,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habitacion $habitacion)
    {
        return view('habitaciones.edit', [
            'habitacion' => $habitacion,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Habitacion $habitacion)
    {
        $validated = $request->validate([
            'numero' => "required|numeric|unique:habitaciones,numero,{$habitacion->id}",
            'planta' => 'required|integer',
            'tipo' => 'required',
            'precio_noche' => 'required|numeric|decimal:2|gte:-999999.99|lte:999999.99',
        ]);
        $habitacion->update($validated);
        return redirect()->route('habitaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habitacion $habitacion)
    {
        if ($habitacion->has('reservas')) {
            return redirect()->route('habitaciones.index')
                ->with('fallo', 'La habitación tiene reservas');
        }
        $habitacion->delete();
        return redirect()->route('habitaciones.index')
            ->with('exito', 'La habitación se ha borrado correctamente');
    }
}
