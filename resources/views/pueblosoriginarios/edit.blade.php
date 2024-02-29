@extends('bases.base')
@section('content')
<div class="card">
    <div class="card-body">
        <h5>Editar Pueblos Originarios</h5>
        <form action="{{route('pueblosoriginarios.update')}}" method='POST'>@csrf
            <div class="row">
                <div class="col-4">
                    <input type="text" name="id" value="{{$pueblos->id}}" hidden>
                    <label for="">Provincia</label>
                    <select class="form-select" id="provincias">                        
                        <option value="--">--</option>
                        @foreach ($provincias as $p)
                            @if ($p->agrupado==$pueblos->agrupado)
                                <option value="{{$p->agrupado}}" selected>{{$p->provincia}}</option>
                            @else
                                <option value="{{$p->agrupado}}">{{$p->provincia}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="">Distrito</label>
                        <select class="form-select" name="id_ubigeo" id="distritos"> 
                                <option value="{{$pueblos->id_ubigeo}}">{{$pueblos->distrito}}</option>
                        </select>
                </div>
                
                
                <div class="col-4">
                    <label for="">Cuenca/Rio</label>
                    <input type="text" name="cuenca_rio" class="form-control" value="{{$pueblos->cuenca_rio}}">
                </div>
                <div class="col-4">
                    <label for="">Federación</label>
                    <select class="single-select" name="id_federacion">
                        @foreach ($federaciones as $f)
                            @if ($f->id==$pueblos->id_federacion)
                                <option value="{{$f->id}}" selected>{{$f->nombre_federacion}}</option>
                            @else
                                <option value="{{$f->id}}">{{$f->nombre_federacion}}</option>
                                
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="col-4">
                    <label for="">Directiva</label>
                    <select id="" class="form-select" name="directiva">
                        <option value="APU">APU</option>
                        <option value="TNTE. GOBERNADOR">TNTE. GOBERNADOR</option>
                    </select>
                </div>
                <div class="col-2">
                    <label for="">Predios</label>
                    <input type="number" class="form-control" name="predios" value="0">
                </div>
                <div class="col-2">
                    <label for="">Población</label>
                    <input type="number" class="form-control" name="poblacion" value="0">
                </div>
                <div class="col-2">
                    <label for="">Colegios</label>
                    <input type="number" class="form-control" name="colegio" value="0">
                </div>
                <div class="col-2">
                    <label for="">Postas M.</label>
                    <input type="number" class="form-control" name="postas_medicas" value="0">
                </div>
                <div class="col-2">
                    <label for="">Elect..</label>
                    <input type="number" class="form-control" name="energia_electrica" value="0">
                </div>
                <div class="col-2">
                    <label for="">A. Potable</label>
                    <input type="number" class="form-control" name="agua_potable" value="0">
                </div>
                
                <div class="col-2">
                    <label for="">Local Com.</label>
                    <input type="number" class="form-control" name="local_comunal" value="0">
                </div>
                <div class="col-2">
                    <label for="">P.N.Ejec..</label>
                    <input type="number" class="form-control" name="proyecto_nucleo_ejecutor" value="0">
                </div>
                <div class="col-2">
                    <label for="">Iglesias</label>
                    <input type="number" class="form-control" name="iglesias" value="0">
                </div>
                <div class="col-4">
                    <label for="">Condición G.</label>
                    <select id="" class="form-select" name="id_condicion_geografica">
                        @foreach ($condicion_geografica as $cg)
                            @if ($cg->id==$pueblos->id_condicion_geografica)
                                <option value="{{$cg->id}}" selected>{{$cg->nombre_condicion}}</option>
                            @else
                                <option value="{{$cg->id}}">{{$cg->nombre_condicion}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="">Actividad E.</label>
                    <select class="form-select" name="id_actividad_economica">
                        @foreach ($actividad_economica as $ae)
                            @if ($ae->id==$pueblos->id_actividad_economica)
                                <option value="{{$ae->id}}" selected>{{$ae->nombre_actividad}}</option>
                            @else
                                <option value="{{$ae->id}}">{{$ae->nombre_actividad}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="">Nivel E.</label>
                    <select class="form-select" name="id_nivel_educativo">
                        @foreach ($nivel_educativo as $ne)
                            @if ($ne->id==$pueblos->id_nivel_educativo)
                                <option value="{{$ne->id}}" selected>{{$ne->nombre_nivel}}</option>
                            @else
                                <option value="{{$ne->id}}">{{$ne->nombre_nivel}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="">Religion</label>
                    <select class="form-select" name="id_religion">
                        @foreach ($religiones as $r)
                            @if ($r->id==$pueblos->id_religion)
                                <option value="{{$r->id}}" selected>{{$r->nombre_religion}}</option>
                            @else
                                <option value="{{$r->id}}">{{$r->nombre_religion}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="">Lengua O.</label>
                    <select class="single-select" name="id_lengua_originaria">
                        @foreach ($lenguas_originarias as $lo)
                            @if ($lo->id==$pueblos->id_lengua_originaria)
                                <option value="{{$lo->id}}" selected>{{$lo->nombre_lengua}}</option>
                            @else
                                <option value="{{$lo->id}}">{{$lo->nombre_lengua}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="">Comunidades</label>
                    <select id="" class="single-select" name="id_comunidad">
                        @foreach ($comunidades as $c)
                            @if ($c->id==$pueblos->id_comunidad)
                                <option value="{{$c->id}}" selected>{{$c->nombre_comunidad}}</option>
                            @else
                                <option value="{{$c->id}}">{{$c->nombre_comunidad}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="">Autoridades</label>
                    <select id="" class="single-select" name="id_autoridades">
                        @foreach ($autoridades as $a)
                            @if ($a->id==$pueblos->id_autoridades)
                                <option value="{{$a->id}}" selected>{{$a->nombre}} - {{$a->apellidos}}</option>
                            @else   
                                <option value="{{$a->id}}">{{$a->nombre}} - {{$a->apellidos}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="col">
                <br>    
                <button class="btn btn-primary btn-sm" type="submit">Guardar</button>
            </div>
        </form>


        {{-- @if(session()->has('error'))
            <div class="col-sm-4">
                <div class="alert border-0 border-start border-5 border-danger alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-danger"><i class='bx bxs-check-circle'></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-danger">Mensaje</h6>
                            <div>{{Session::get('error')}}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if(session()->has('mensaje'))
            <div class="col-sm-4">
                <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-success"><i class='bx bxs-check-circle'></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-success">Mensaje</h6>
                            <div>{{Session::get('mensaje')}}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif --}}




    </div>
</div>

@endsection

@section('script')
    
    <script>
        var _distritos=[]
        $(document).ready(function() {
            $('#dtPueblosOriginarios').DataTable();

            $.ajax({
                type: "GET",
                url: "{{route('obtener.distritos')}}",
                dataType: "json",
                success: function (response) {
                    response.forEach(element => {
                        _distritos.push({'id':element.id,'distrito':element.distrito,'agrupado':element.agrupado});

                        if ($("#provincias").val()==element.agrupado) {
                            if (element.id!==$("#distritos").val()) {
                                $('#distritos').append($('<option>', {
                                    value: element.id,
                                    text: element.distrito
                                }));
                            }
                        }
                    });



                }
            });
        });



        $('#provincias').change(function (e) { 
            e.preventDefault(); 
            _agrupado=$(this).val();
            $('#distritos').empty();
            _distritos.forEach(element => {
                if (_agrupado==element.agrupado) {
                    $('#distritos').append($('<option>', {
                        value: element.id,
                        text: element.distrito
                    }));
                }
            });
        });


    </script>
@endsection