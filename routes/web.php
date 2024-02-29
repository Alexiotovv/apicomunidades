<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomesController;
use App\Http\Controllers\PueblosIndigenasController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',function(){
    return view('login');
})->name('credentials');

//Register and Login user
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('home/', [HomesController::class, 'index'])->name('home');

Route::post('/profile', function () { return auth()->user(); });
Route::patch('/change_status/user/{id_user}', [UserController::class,'change_status']);
Route::post('/register', [UserController::class,'register'])->name('register');

//Usuarios
Route::get('/users', [UserController::class,'users'])->name('users');
Route::get('/users/edit/{id}', [UserController::class,'edit'])->name('usuario.edit');
Route::get('/users/create', [UserController::class,'create'])->name('usuario.create');
Route::post('/users/update', [UserController::class,'update'])->name('usuario.update');


//Ubigeos
Route::get('/ubigeos/distritos', [PueblosIndigenasController::class,'obtener_distritos'])->name('obtener.distritos');


//Pueblos Indigenas
Route::get('/pueblosoriginarios/create', [PueblosIndigenasController::class,'create'])->name('pueblosoriginarios.create');
Route::post('/pueblosoriginarios/store', [PueblosIndigenasController::class,'store'])->name('pueblosoriginarios.store');
Route::get('/pueblosoriginarios/index', [PueblosIndigenasController::class,'index'])->name('pueblosoriginarios.index');
Route::post('/pueblosoriginarios/update', [PueblosIndigenasController::class,'update'])->name('pueblosoriginarios.update');
Route::get('/pueblosoriginarios/edit/{id}', [PueblosIndigenasController::class,'edit'])->name('pueblosoriginarios.edit');
Route::get('/pueblosoriginarios/show/{puebloindigena_id}', [PueblosIndigenasController::class,'show'])->name('pueblosoriginarios.show');

//Niveles Educativos
Route::post('/nivel_educativo', [NivelEducativosController::class,'store']);
Route::get('/nivel_educativo', [NivelEducativosController::class,'index']);
Route::put('/nivel_educativo/{niveleducativo_id}', [NivelEducativosController::class,'update']);


//Religiones
Route::get('/religiones', [ReligionesController::class,'index']);
Route::post('/religiones', [ReligionesController::class,'store']);
Route::put('/religiones/{religiones_id}', [ReligionesController::class,'update']);

//Lenguas Originarias
Route::get('/lenguas_originarias', [LenguasOriginariasController::class,'index']);
Route::post('/lenguas_originarias', [LenguasOriginariasController::class,'store']);
Route::put('/lenguas_originarias/{lenguasoriginarias_id}', [LenguasOriginariasController::class,'update']);

//Actividades Economicas
Route::get('/actividad_economica', [ActividadEconomicasController::class,'index']);
Route::post('/actividad_economica', [ActividadEconomicasController::class,'store']);
Route::get('/actividad_economica/show/{actividadeconomica_id}', [ActividadEconomicasController::class,'show']);
Route::put('/actividad_economica/{actividadeconomica_id}', [ActividadEconomicasController::class,'update']);

//Condicicon Geografica
Route::get('/condicion_geografica', [CondicionGeograficasController::class,'index']);
Route::post('/condicion_geografica', [CondicionGeograficasController::class,'store']);
Route::put('/condicion_geografica/{condiciongeografica_id}', [CondicionGeograficasController::class,'update']);
