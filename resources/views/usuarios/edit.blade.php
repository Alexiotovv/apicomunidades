@extends('bases.base')
@section('content')
<div class="card">
    <div class="card-body">
        <h5>Editar Usuario</h5>
            <form action="{{route('usuario.update')}}" method="POST">@csrf
                <input type="text" name="id" value="{{$usuario->id}}" hidden>
                <label for="">Nombre</label>
                <input type="text" value="{{$usuario->name}}" class="form-control" name="name">
                <label for="">Correo</label>
                <input type="email" class="form-control" name="email" value="{{$usuario->email}}">
                <label for="">Rol</label>
                <select name="role" id="" class="form-select">
                    @if ($usuario->role==0)
                        <option value="0" selected>Admin</option>
                        <option value="1">Registrador</option>
                        <option value="2">Visor</option>
                    @elseif ($usuario->role==1)
                        <option value="1" selected>Registrador</option>
                        <option value="0">Admin</option>
                        <option value="2">Visor</option>
                    @else
                        <option value="0">Admin</option>
                        <option value="1">Registrador</option>
                        <option value="2" selected>Visor</option>
                    @endif
                </select>

                <label for="">Estado</label>
                <select name="status" id="" class="form-select">
                    @if ($usuario->status==1)
                        <option value="1" selected>Activado</option>
                        <option value="0">Desactivado</option>
                    @elseif ($usuario->status==0)
                        <option value="1">Activado</option>
                        <option value="0" selected>Desactivado</option>
                    @endif
                </select>
                <label for="">Contraseña</label>
                <input type="password" class="form-control" name="contra" value="">
                <br>
                <button class="btn btn-primary bt-sm">Guardar</button>
            </form>

        </form>
      
    </div>
</div>

@endsection

@section('script')

@endsection