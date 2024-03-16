<?php

namespace App\Http\Controllers;

use App\Models\religiones;
use Illuminate\Http\Request;

class ReligionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $religiones=religiones::all();
            return response()->json(['data'=>$religiones]);
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
            $obj= new religiones();
            $obj->nombre_religion=request('nombre_religion');
            $obj->save();
            return response()->json(['message' => 'registered successfully'],200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'server error'],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(religiones $religiones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(religiones $religiones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $religiones_id)
    {
        try {
            $obj= religiones::findOrFail($religiones_id);
            $obj->nombre_religion=request('nombre_religion');
            $obj->save();
            return response()->json(['message' => 'registered successfully'],200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'server error'],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(religiones $religiones)
    {
        //
    }
}
