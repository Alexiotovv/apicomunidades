@extends('bases.base')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <h5>Crear Usuario</h5>
                <form action="{{route('register')}}" method="POST">@csrf
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="name">
                    <label for="">Correo</label>
                    <input type="email" class="form-control" name="email">
                    <label for="">Rol</label>
                    <select name="role" id="" class="form-select">
                        <option value="0">Admin</option>
                        <option value="1">Registrador</option>
                        <option value="2">Visor</option>
                    </select>
                    <label for="">Contraseña</label>
                    <input type="password" name="password" placeholder="******" class="form-control">
                    <br>
                    <button class="btn btn-primary bt-sm">Guardar</button>
                </form>
              

            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection