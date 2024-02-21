<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    public function register(Request $request){
        //Recepcionamos los datos para validar
        $validator=Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email'=> 'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8'
        ]);

        //Preguntamos si hay errores en la validacion
        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }

        //Creamos el usuario
        $user = User::create([
            'name'=> $request->input('name'),
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ]);

        return response()->json(['message' => 'User registered successfully'], 201);
    }




    public function change_status(Request $request, $id_user)
    {

        try {

            $status_user=$request->input('status_user');
            $user = User::findOrFail($id_user);
            $user->status=$status_user;
            $user->save(); // Actualiza el estado del usuario
            return response()->json(['message' => 'Status cambiado correctamente'],200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'server error'],500);
        }

    }

    public function users(Request $request){
        try {
            $users = User::all();
            // $users=compact($users);
            return response()->json(['usuarios' => $users],200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'server error'],500);
        }
    }

}
