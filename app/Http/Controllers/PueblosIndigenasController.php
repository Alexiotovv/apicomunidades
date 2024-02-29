<?php

namespace App\Http\Controllers;

use App\Models\pueblos_indigenas;
use Illuminate\Http\Request;
use DB;
class PueblosIndigenasController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index(Request $request)
    {
        //    try { 

            $pueblos=DB::table('pueblos_indigenas')
            ->leftjoin('ubigeos','ubigeos.id','=','pueblos_indigenas.id_ubigeo')
            ->leftjoin('condicion_geograficas','condicion_geograficas.id','=','pueblos_indigenas.id_condicion_geografica')
            ->leftjoin('actividad_economicas','actividad_economicas.id','=','pueblos_indigenas.id_actividad_economica')
            ->leftjoin('nivel_educativos','nivel_educativos.id','=','pueblos_indigenas.id_nivel_educativo')
            ->leftjoin('religiones','religiones.id','=','pueblos_indigenas.id_religion')
            ->leftjoin('lenguas_originarias','lenguas_originarias.id','=','pueblos_indigenas.id_lengua_originaria')
            ->leftjoin('comunidades','comunidades.id','=','pueblos_indigenas.id_comunidad')
            ->leftjoin('autoridades','autoridades.id','=','pueblos_indigenas.id_autoridades')
            ->leftjoin('federaciones','federaciones.id','=','pueblos_indigenas.id_federacion')
            ->select(
                    'pueblos_indigenas.id as id',    
                    'ubigeos.provincia as provincia',
                    'ubigeos.distrito as distrito',
                    'pueblos_indigenas.cuenca_rio as cuencario',
                    'pueblos_indigenas.directiva as directiva',
                    'federaciones.nombre_federacion as federacion',
                    'pueblos_indigenas.predios as predios',
                    'pueblos_indigenas.poblacion as poblacion',
                    'pueblos_indigenas.colegio as colegios',
                    'pueblos_indigenas.postas_medicas as postas_medicas',
                    'pueblos_indigenas.energia_electrica as energia_electrica',
                    'pueblos_indigenas.agua_potable as agua_potable',
                    'pueblos_indigenas.local_comunal as local_comunal',
                    'pueblos_indigenas.proyecto_nucleo_ejecutor as p_n_ejecutor',
                    'pueblos_indigenas.iglesias as iglesias',
                    'condicion_geograficas.nombre_condicion as condicion_geografica',
                    'actividad_economicas.nombre_actividad as actividad_economica',
                    'nivel_educativos.nombre_nivel as nivel_educativo',
                    'religiones.nombre_religion as religion',
                    'lenguas_originarias.nombre_lengua as lengua_originaria',
                    'comunidades.nombre_comunidad as comunidad',
                    'autoridades.nombre as autoridad')
            ->get();
        

        return view('pueblosoriginarios.index',compact('pueblos'));
      
        // } catch (\Throwable $th) {
        //     return response()->json(['message' => 'server error'],500);
        // }
    }

    /**
     * Show the form for creating a new resource.
     */

    public function obtener_distritos(){
        $distritos=DB::table('ubigeos')->select('ubigeos.id','ubigeos.agrupado','ubigeos.distrito')->get();
        return response()->json($distritos, 200);
    }

    public function create()
    {
        
        $provincias=DB::table('ubigeos')->select('ubigeos.agrupado','ubigeos.provincia')->distinct()->get();
        $lenguas=DB::table('lenguas_originarias')->select('lenguas_originarias.id','lenguas_originarias.nombre_lengua')->get();
        $federaciones=DB::table('federaciones')->select('federaciones.id','federaciones.nombre_federacion')->get();
        $condicion_geografica=DB::table('condicion_geograficas')->select('condicion_geograficas.id','condicion_geograficas.nombre_condicion')->get();
        $actividad_economica=DB::table('actividad_economicas')->select('actividad_economicas.id','actividad_economicas.nombre_actividad')->get();
        $nivel_educativo=DB::table('nivel_educativos')->select('nivel_educativos.id','nivel_educativos.nombre_nivel')->get();
        $lenguas_originarias=DB::table('lenguas_originarias')->select('lenguas_originarias.id','lenguas_originarias.nombre_lengua')->get();
        $autoridades=DB::table('autoridades')->select('autoridades.id','autoridades.nombre','autoridades.apellidos')->get();
        $comunidades=DB::table('comunidades')->select('comunidades.id','comunidades.nombre_comunidad')->get();
        $religiones=DB::table('religiones')->select('religiones.id','religiones.nombre_religion')->get();
        
        return view('pueblosoriginarios.create',
                compact(
                    'lenguas',
                    'federaciones',
                    'condicion_geografica',
                    'actividad_economica',
                    'nivel_educativo',
                    'lenguas_originarias',
                    'autoridades',
                    'comunidades',
                    'provincias',
                    'religiones'
        ));
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // try {  
            $obj = new pueblos_indigenas();
            
            $obj->cuenca_rio=request('cuenca_rio');
            $obj->directiva=request('directiva');
            $obj->id_federacion=request('id_federacion');
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
            return redirect()->route('pueblosoriginarios.index')->with('mensaje','Registrado Correctamente!');
        // } catch (\Throwable $th) {
        //     return response()->json(['message' => 'server error'],500);
        // }
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
    public function edit($id)
    {
        $provincias=DB::table('ubigeos')->select('ubigeos.agrupado','ubigeos.provincia')->distinct('ubigeos.agrupado')->get();
        $lenguas=DB::table('lenguas_originarias')->select('lenguas_originarias.id','lenguas_originarias.nombre_lengua')->get();
        $federaciones=DB::table('federaciones')->select('federaciones.id','federaciones.nombre_federacion')->get();
        $condicion_geografica=DB::table('condicion_geograficas')->select('condicion_geograficas.id','condicion_geograficas.nombre_condicion')->get();
        $actividad_economica=DB::table('actividad_economicas')->select('actividad_economicas.id','actividad_economicas.nombre_actividad')->get();
        $nivel_educativo=DB::table('nivel_educativos')->select('nivel_educativos.id','nivel_educativos.nombre_nivel')->get();
        $lenguas_originarias=DB::table('lenguas_originarias')->select('lenguas_originarias.id','lenguas_originarias.nombre_lengua')->get();
        $autoridades=DB::table('autoridades')->select('autoridades.id','autoridades.nombre','autoridades.apellidos')->get();
        $comunidades=DB::table('comunidades')->select('comunidades.id','comunidades.nombre_comunidad')->get();
        $religiones=DB::table('religiones')->select('religiones.id','religiones.nombre_religion')->get();

        $pueblos=DB::table('pueblos_indigenas')
        ->leftjoin('ubigeos','ubigeos.id','=','pueblos_indigenas.id_ubigeo')
        ->select('ubigeos.provincia','ubigeos.distrito','ubigeos.agrupado','pueblos_indigenas.*')
        ->where('pueblos_indigenas.id','=',$id)
        ->first();
        
        return view('pueblosoriginarios.edit',compact('pueblos',
            'lenguas',
            'federaciones',
            'condicion_geografica',
            'actividad_economica',
            'nivel_educativo',
            'lenguas_originarias',
            'autoridades',
            'comunidades',
            'provincias',
            'religiones',
            
        ));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // try {  
            $id=request('id');
            $obj = pueblos_indigenas::findOrFail($id);
            $obj->cuenca_rio=request('cuenca_rio');
            $obj->directiva=request('directiva');
            $obj->id_federacion=request('id_federacion');
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
            return redirect()->route('pueblosoriginarios.index')->with('mensaje','Registrado Correctamente!');
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
