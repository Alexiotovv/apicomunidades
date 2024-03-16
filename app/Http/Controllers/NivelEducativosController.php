<?php

namespace App\Http\Controllers;

use App\Models\nivel_educativos;
use Illuminate\Http\Request;

class NivelEducativosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $nivel=nivel_educativos::all();
            return response()->json(['data' => $nivel]);
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
            $obj= new nivel_educativos();
            $obj->nombre_nivel=request('nombre_nivel');
            $obj->save();
            return response()->json(['message' => 'registered successfully'],200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'server error'],500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(nivel_educativos $nivel_educativos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(nivel_educativos $nivel_educativos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $niveleducativo_id)
    {
        // try {
            $obj= nivel_educativos::findOrFail($niveleducativo_id);
            $obj->nombre_nivel=request('nombre_nivel');
            $obj->save();
            return response()->json(['message' => 'updated successfully'],200);
        // } catch (\Throwable $th) {
        //     return response()->json(['message' => 'server error'],500);
        // }

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(nivel_educativos $nivel_educativos)
    {
        //
    }
}
