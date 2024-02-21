<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LenguasOriginariasController;
use App\Http\Controllers\ReligionesController;
use App\Http\Controllers\NivelEducativosController;
use App\Http\Controllers\ActividadEconomicasController;
use App\Http\Controllers\CondicionGeograficasController;
use App\Http\Controllers\UbigeosController;
use App\Http\Controllers\PueblosIndigenasController;
use App\Http\Controllers\ComunidadesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Register and Login user
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

//Users
Route::middleware('jwt.auth')->post('/profile', function () { return auth()->user(); });
Route::middleware('jwt.auth')->patch('/change_status/user/{id_user}', [UserController::class,'change_status']);
Route::post('/register', [UserController::class,'register']);
Route::middleware('jwt.auth')->get('/users', [UserController::class,'users']);
    
//Pueblos Indigenas
Route::middleware('jwt.auth')->post('/pueblosindigenas', [PueblosIndigenasController::class,'store']);
Route::middleware('jwt.auth')->get('/pueblosindigenas/{per_page}', [PueblosIndigenasController::class,'index']);
Route::middleware('jwt.auth')->put('/pueblosindigenas/{puebloindigena_id}', [PueblosIndigenasController::class,'update']);
Route::middleware('jwt.auth')->get('/pueblosindigenas/show/{puebloindigena_id}', [PueblosIndigenasController::class,'show']);

//Niveles Educativos
Route::middleware('jwt.auth')->post('/nivel_educativo', [NivelEducativosController::class,'store']);
Route::middleware('jwt.auth')->get('/nivel_educativo', [NivelEducativosController::class,'index']);
Route::middleware('jwt.auth')->put('/nivel_educativo/{niveleducativo_id}', [NivelEducativosController::class,'update']);


//Religiones
Route::middleware('jwt.auth')->get('/religiones', [ReligionesController::class,'index']);
Route::middleware('jwt.auth')->post('/religiones', [ReligionesController::class,'store']);
Route::middleware('jwt.auth')->put('/religiones/{religiones_id}', [ReligionesController::class,'update']);

//Lenguas Originarias
Route::middleware('jwt.auth')->get('/lenguas_originarias', [LenguasOriginariasController::class,'index']);
Route::middleware('jwt.auth')->post('/lenguas_originarias', [LenguasOriginariasController::class,'store']);
Route::middleware('jwt.auth')->put('/lenguas_originarias/{lenguasoriginarias_id}', [LenguasOriginariasController::class,'update']);

//Actividades Economicas
Route::middleware('jwt.auth')->get('/actividad_economica', [ActividadEconomicasController::class,'index']);
Route::middleware('jwt.auth')->post('/actividad_economica', [ActividadEconomicasController::class,'store']);
Route::middleware('jwt.auth')->get('/actividad_economica/show/{actividadeconomica_id}', [ActividadEconomicasController::class,'show']);
Route::middleware('jwt.auth')->put('/actividad_economica/{actividadeconomica_id}', [ActividadEconomicasController::class,'update']);

//Condicicon Geografica
Route::middleware('jwt.auth')->get('/condicion_geografica', [CondicionGeograficasController::class,'index']);
Route::middleware('jwt.auth')->post('/condicion_geografica', [CondicionGeograficasController::class,'store']);
Route::middleware('jwt.auth')->put('/condicion_geografica/{condiciongeografica_id}', [CondicionGeograficasController::class,'update']);



//Settings
Route::middleware('jwt.auth')->get('/ubigeos', [UbigeosController::class,'index']);



