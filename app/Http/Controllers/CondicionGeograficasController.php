<?php

namespace App\Http\Controllers;

use App\Models\condicion_geograficas;
use Illuminate\Http\Request;

class CondicionGeograficasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $condiciones=condicion_geograficas::all();
            return response()->json(['condicion_geograficas' => $condiciones]);
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
        $obj = new condicion_geograficas();
        $obj->nombre_condicion=request('nombre_condicion');
        $obj->save();
        return response()->json(['message' => 'registered successfully'],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(condicion_geograficas $condicion_geograficas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(condicion_geograficas $condicion_geograficas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $condiciongeografica_id)
    {
        $obj = condicion_geograficas::findOrFail($condiciongeografica_id);
        $obj->nombre_condicion=request('nombre_condicion');
        $obj->save();
        return response()->json(['message' => 'updated successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(condicion_geograficas $condicion_geograficas)
    {
        //
    }
}
