<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlataformaRequest;
use App\Http\Requests\UpdatePlataformaRequest;
use App\Models\Plataforma;

class PlataformaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlataformaRequest $request)
    {
        Plataforma::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Plataforma $plataforma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plataforma $plataforma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlataformaRequest $request, Plataforma $plataforma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plataforma $plataforma)
    {
        //
    }
}
