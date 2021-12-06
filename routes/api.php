<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\v1\UserController;
use \App\Http\Controllers\Api\v1\AutoController;
use \App\Http\Controllers\Api\v1\EducationController;
use \App\Http\Controllers\Api\v1\EmployeeController;
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

//Users routes
Route::get('/users', [UserController::class, 'index']);
Route::post('/users/add', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
//Auto routes
Route::get('/autos', [AutoController::class, 'index']);
Route::post('/autos/add', [AutoController::class, 'store']);
Route::get('/autos/{id}', [AutoController::class, 'show']);
Route::post('/autos/{id}', [AutoController::class, 'update']);
Route::delete('/autos/{id}', [AutoController::class, 'destroy']);
//Education routes
Route::get('/educations', [EducationController::class, 'index']);
Route::post('/educations/add', [EducationController::class, 'store']);
Route::get('/educations/{id}', [EducationController::class, 'show']);
Route::post('/educations/{id}', [EducationController::class, 'update']);
Route::delete('/educations/{id}', [EducationController::class, 'destroy']);
//Employees routes
Route::get('/employees', [EducationController::class, 'index']);
Route::post('/employees/add', [EducationController::class, 'store']);
Route::get('/employees/{id}', [EducationController::class, 'show']);
Route::post('/employees/{id}', [EducationController::class, 'update']);
Route::delete('/employees/{id}', [EducationController::class, 'destroy']);

