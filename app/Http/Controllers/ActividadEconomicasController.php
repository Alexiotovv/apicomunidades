<?php

namespace App\Http\Controllers;

use App\Models\actividad_economicas;
use Illuminate\Http\Request;

class ActividadEconomicasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $actividades=actividad_economicas::all();
            return response()->json(['data' => $actividades]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'server error'],500);
        }
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
    public function store(Request $request)
    {
        try {
            $obj= new actividad_economicas();
            $obj->nombre_actividad=request('nombre_actividad');
            $obj->save();
            return response()->json(['message' => 'registered successfully'],200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'server error'],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($actividadeconomica_id)
    {
        $actividad = actividad_economicas::find($actividadeconomica_id);
        return response()->json(['actividad_economica' => $actividad],200);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(actividad_economicas $actividad_economicas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $actividadeconomica_id)
    {
        try {
            $obj= actividad_economicas::findOrFail($actividadeconomica_id);
            $obj->nombre_actividad=request('nombre_actividad');
            $obj->save();
            return response()->json(['message' => 'updated successfully'],200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'server error'],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(actividad_economicas $actividad_economicas)
    {
        //
    }
}
