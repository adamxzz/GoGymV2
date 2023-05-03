<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HabitController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\EntriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// every route within these curly brackets require authentication token
Route::middleware('auth:sanctum')->group(function (){
    Route::post('/auth/logout',[AuthController::class, 'logout']);
    Route::get('/auth/user',[AuthController::class, 'user']);

    // You need to be logged in for all book functionality except get all and get by id
    // Route::apiResource('/books', BookController::class)->except((['index', 'show']));
    Route::get('/habits/auth', [HabitController::class, 'getByAuth']);
    Route::get('/workouts/auth', [WorkoutController::class, 'getByAuth']);
    Route::get('/workouts/chart/{type}', [WorkoutController::class, 'getChartData']);
    Route::apiResource('/habits', HabitController::class);
    Route::apiResource('/workouts', WorkoutController::class);



});


Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::apiResource('/entries', EntriesController::class);