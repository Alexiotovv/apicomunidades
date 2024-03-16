<?php

namespace App\Http\Controllers;

use App\Models\ubigeos;
use Illuminate\Http\Request;

class UbigeosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $ubigeos=ubigeos::all();
            return response()->json(['data' => $ubigeos]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ubigeos $ubigeos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ubigeos $ubigeos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ubigeos $ubigeos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ubigeos $ubigeos)
    {
        //
    }
}
