@extends('bases.base')
@section('content')
<div class="card">
    <div class="card-body">
        @if(session()->has('error'))
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
        @endif


        <div class="col-sm-12" style="text-align: -webkit-right">
            <a class="btn btn-primary btn-sm" id="btnNuevo" href="{{route('pueblosoriginarios.create')}}">Nuevo</a>
        </div>
        <br>
        <div class="table-responsive">
            <table id="dtPueblosOriginarios" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Acciones</th>
                        <th>provincia</th>
                        <th>distrito</th>
                        <th>cuencario</th>
                        <th>directiva</th>
                        <th>federacion</th>
                        <th>predios</th>
                        <th>poblacion</th>
                        <th>colegios</th>
                        <th>postas_medicas</th>
                        <th>energia_electrica</th>
                        <th>agua_potable</th>
                        <th>local_comunal</th>
                        <th>p_n_ejecutor</th>
                        <th>iglesias</th>
                        <th>condicion_geografica</th>
                        <th>actividad_economica</th>
                        <th>nivel_educativo</th>
                        <th>religion</th>
                        <th>lengua_originaria</th>
                        <th>comunidad</th>
                        <th>autoridad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pueblos as $p)
                        <tr>
                            <td><a href="{{route('pueblosoriginarios.edit',$p->id)}}" class="btn btn-warning btn-sm">Editar</a></td>
                            <td>{{$p->provincia}}</td>
                            <td>{{$p->distrito}}</td>
                            <td>{{$p->cuencario}}</td>
                            <td>{{$p->directiva}}</td>
                            <td>{{$p->federacion}}</td>
                            <td>{{$p->predios}}</td>
                            <td>{{$p->poblacion}}</td>
                            <td>{{$p->colegios}}</td>
                            <td>{{$p->postas_medicas}}</td>
                            <td>{{$p->energia_electrica}}</td>
                            <td>{{$p->agua_potable}}</td>
                            <td>{{$p->local_comunal}}</td>
                            <td>{{$p->p_n_ejecutor}}</td>
                            <td>{{$p->iglesias}}</td>
                            <td>{{$p->condicion_geografica}}</td>
                            <td>{{$p->actividad_economica}}</td>
                            <td>{{$p->nivel_educativo}}</td>
                            <td>{{$p->religion}}</td>
                            <td>{{$p->lengua_originaria}}</td>
                            <td>{{$p->comunidad}}</td>
                            <td>{{$p->autoridad}}</td>

                            {{-- <td>
                                <a class="btn btn-warning btn-sm" href="{{route('usuario.edit',$d->id)}}">Editar</a>
                                <button class="btn btn-info btn-sm">Cambiar Contraseña</button>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>provincia</th>
                        <th>distrito</th>
                        <th>cuencario</th>
                        <th>directiva</th>
                        <th>federacion</th>
                        <th>predios</th>
                        <th>poblacion</th>
                        <th>colegios</th>
                        <th>postas_medicas</th>
                        <th>energia_electrica</th>
                        <th>agua_potable</th>
                        <th>local_comunal</th>
                        <th>p_n_ejecutor</th>
                        <th>iglesias</th>
                        <th>condicion_geografica</th>
                        <th>actividad_economica</th>
                        <th>nivel_educativo</th>
                        <th>religion</th>
                        <th>lengua_originaria</th>
                        <th>comunidad</th>
                        <th>autoridad</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        
    </script>
    <script>
         $(document).ready(function() {
        $('#dtPueblosOriginarios').DataTable(
            {
                dom: 'Bfrtip', // Indica que quieres usar los botones
                buttons: [
                'excel' // Habilita el botón de Excel
                ],
                
            }
        );
    });
    </script>
@endsection