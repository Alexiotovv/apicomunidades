<?php

namespace App\Http\Controllers;

use App\Models\pueblos_indigenas;
use Illuminate\Http\Request;

class PueblosIndigenasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,$per_page)
    {
           try {
            
            $pueblos=pueblos_indigenas::paginate($per_page);    
            return response()->json(['pueblos_indigenas' => $pueblos],200);
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
            $obj = new pueblos_indigenas();
            
            $obj->cuenca_rio=request('cuenca_rio');
            $obj->directiva=request('directiva');
            $obj->federacion=request('federacion');
            $obj->predios=request('predios');
            $obj->poblacion=request('poblacion');
            $obj->colegio=request('colegio');
            $obj->postas_medicas=request('postas_medicas');
            $obj->energia_electrica=request('energia_electrica');
            $obj->agua_potable=request('agua_potable');
            $obj->local_comunal=request('local_comunal');
            $obj->proyecto_nucleo_ejecutor=request('proyecto_nucleo_ejecutor');
            $obj->iglesias=request('iglesias');
            $obj->id_ubigeo=request('id_ubigeo');
            $obj->id_condicion_geografica=request('id_condicion_geografica');
            $obj->id_actividad_economica=request('id_actividad_economica');
            $obj->id_nivel_educativo=request('id_nivel_educativo');
            $obj->id_religion=request('id_religion');
            $obj->id_lengua_originaria=request('id_lengua_originaria');
            $obj->id_comunidad=request('id_comunidad');
            $obj->id_autoridades=request('id_autoridades');
            $obj->save();
            return response()->json(['message' => 'registered successfully'],200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'server error'],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($pueblosindigena_id)
    {
        $pueblo_indigena=pueblos_indigenas::find($pueblosindigena_id);
        return response()->json(['pueblo_indigena' => $pueblo_indigena],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pueblos_indigenas $pueblos_indigenas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $puebloindigena_id)
    {
        // try {  
            
            $obj = pueblos_indigenas::findOrFail($puebloindigena_id);
            $obj->cuenca_rio=request('cuenca_rio');
            $obj->directiva=request('directiva');
            $obj->federacion=request('federacion');
            $obj->predios=request('predios');
            $obj->poblacion=request('poblacion');
            $obj->colegio=request('colegio');
            $obj->postas_medicas=request('postas_medicas');
            $obj->energia_electrica=request('energia_electrica');
            $obj->agua_potable=request('agua_potable');
            $obj->local_comunal=request('local_comunal');
            $obj->proyecto_nucleo_ejecutor=request('proyecto_nucleo_ejecutor');
            $obj->iglesias=request('iglesias');
            $obj->id_ubigeo=request('id_ubigeo');
            $obj->id_condicion_geografica=request('id_condicion_geografica');
            $obj->id_actividad_economica=request('id_actividad_economica');
            $obj->id_nivel_educativo=request('id_nivel_educativo');
            $obj->id_religion=request('id_religion');
            $obj->id_lengua_originaria=request('id_lengua_originaria');
            $obj->id_comunidad=request('id_comunidad');
            $obj->id_autoridades=request('id_autoridades');
            $obj->save();

            return response()->json(['message' => 'updated successfully'],200);
        // } catch (\Throwable $th) {
        //     return response()->json(['message' => 'server error'],500);
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pueblos_indigenas $pueblos_indigenas)
    {
        //
    }
}
