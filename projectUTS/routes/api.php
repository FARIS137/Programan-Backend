<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
#method get
Route::get('/patients', [PatientsController::class, 'index']);

# method post
Route::post('/patients', [patientsController::class, 'store']);

#method show
Route::get('/patients/{id}', [PatientsController::class, 'show']);


# method put
Route::put('/patients/{id}', [patientsController::class, 'update']);

# method delete
Route::delete('/patients/{id}', [patientsController::class, 'destroy']);

# Search Resource by Name
Route::get('/patients/search/{name}', [patientController::class, 'search']);

# Get Positive Resource
Route::get('/patients/status/positive', [patientController::class, 'positive']);

# Get Recovered Resource
Route::get('/patients/status/recovered', [patientController::class, 'recovered']);

# Get Dead Resource
Route::get('/patients/status/dead', [patientController::class, 'dead']);
});


# membuat route untuk register dan login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);