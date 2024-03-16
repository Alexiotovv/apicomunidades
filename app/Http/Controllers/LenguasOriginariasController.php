<?php

namespace App\Http\Controllers;

use App\Models\lenguas_originarias;
use Illuminate\Http\Request;
use DB;
class LenguasOriginariasController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        
        try {
            $lenguas=DB::table('lenguas_originarias')
            ->select('lenguas_originarias.id as numero','lenguas_originarias.nombre_lengua')
            ->get();

            return response()->json( $lenguas);
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
            $obj= new lenguas_originarias();
            $obj->nombre_lengua=request('nombre_lengua');
            $obj->save();
            return response()->json(['message' => 'registered successfully'],200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'server error'],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(lenguas_originarias $lenguas_originarias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lenguas_originarias $lenguas_originarias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $lenguasoriginarias_id)
    {
        try {
            $obj= lenguas_originarias::findOrFail($lenguasoriginarias_id);
            $obj->nombre_lengua=request('nombre_lengua');
            $obj->save();
            return response()->json(['message' => 'updated successfully'],200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'server error'],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lenguas_originarias $lenguas_originarias)
    {
        //
    }
}
