<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\v1\UserController;
use \App\Http\Controllers\Api\v1\AutoController;
use \App\Http\Controllers\Api\v1\EducationController;
use \App\Http\Controllers\Api\v1\EmployeeController;
use \App\Http\Controllers\Api\v1\InvoiceController;
use \App\Http\Controllers\Api\v1\MaterialController;
use \App\Http\Controllers\Api\v1\ServiceController;
use \App\Http\Controllers\Api\v1\PositionController;
use \App\Http\Controllers\Api\v1\RequestController;
use \App\Http\Controllers\Api\v1\RequestJobController;
use \App\Http\Controllers\Api\v1\SolutionController;
use \App\Http\Controllers\Api\v1\ServiceRequestController;
use \App\Http\Controllers\Api\v1\MaterialRequestController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);

//Users routes
Route::get('/users', [UserController::class, 'index']);
Route::post('/users/add', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users/edit/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
//Auto routes
Route::get('/autos', [AutoController::class, 'index']);
Route::post('/autos/add', [AutoController::class, 'store']);
Route::get('/autos/{id}', [AutoController::class, 'show']);
Route::post('/autos/edit/{id}', [AutoController::class, 'update']);
Route::delete('/autos/{id}', [AutoController::class, 'destroy']);
//Education routes
Route::get('/educations', [EducationController::class, 'index']);
Route::post('/educations/add', [EducationController::class, 'store']);
Route::get('/educations/{id}', [EducationController::class, 'show']);
Route::post('/educations/edit/{id}', [EducationController::class, 'update']);
Route::delete('/educations/{id}', [EducationController::class, 'destroy']);
//Employees routes
Route::get('/employees', [EmployeeController::class, 'index']);
Route::post('/employees/add', [EmployeeController::class, 'store']);
Route::get('/employees/{id}', [EmployeeController::class, 'show']);
Route::post('/employees/edit/{id}', [EmployeeController::class, 'update']);
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy']);
//Invoice routes
Route::get('/invoices', [InvoiceController::class, 'index']);
Route::post('/invoices/add', [InvoiceController::class, 'store']);
Route::get('/invoices/{id}', [InvoiceController::class, 'show']);
Route::post('/invoices/edit/{id}', [InvoiceController::class, 'update']);
Route::delete('/invoices/{id}', [InvoiceController::class, 'destroy']);
//Material routes
Route::get('/materials', [MaterialController::class, 'index']);
Route::post('/materials/add', [MaterialController::class, 'store']);
Route::get('/materials/{id}', [MaterialController::class, 'show']);
Route::post('/materials/edit/{id}', [MaterialController::class, 'update']);
Route::delete('/materials/{id}', [MaterialController::class, 'destroy']);
//Service routes
Route::get('/services', [ServiceController::class, 'index']);
Route::post('/services/add', [ServiceController::class, 'store']);
Route::get('/services/{id}', [ServiceController::class, 'show']);
Route::post('/services/edit/{id}', [ServiceController::class, 'update']);
Route::delete('/services/{id}', [ServiceController::class, 'destroy']);
//Position routes
Route::get('/positions', [PositionController::class, 'index']);
Route::post('/positions/add', [PositionController::class, 'store']);
Route::get('/positions/{id}', [PositionController::class, 'show']);
Route::post('/positions/edit/{id}', [PositionController::class, 'update']);
Route::delete('/positions/{id}', [PositionController::class, 'destroy']);
//Request routes
Route::get('/requests', [RequestController::class, 'index']);
Route::post('/requests/add', [RequestController::class, 'store']);
Route::get('/requests/{id}', [RequestController::class, 'show']);
Route::post('/requests/edit/{id}', [RequestController::class, 'update']);
Route::delete('/requests/{id}', [RequestController::class, 'destroy']);
//Request Job routes
Route::get('/request-jobs', [RequestJobController::class, 'index']);
Route::post('/request-jobs/add', [RequestJobController::class, 'store']);
Route::get('/request-jobs/{id}', [RequestJobController::class, 'show']);
Route::post('/request-jobs/edit/{id}', [RequestJobController::class, 'update']);
Route::delete('/request-jobs/{id}', [RequestJobController::class, 'destroy']);
//Solution routes
Route::get('/solutions', [SolutionController::class, 'index']);
Route::post('/solutions/add', [SolutionController::class, 'store']);
Route::get('/solutions/{id}', [SolutionController::class, 'show']);
Route::post('/solutions/edit/{id}', [SolutionController::class, 'update']);
Route::delete('/solutions/{id}', [SolutionController::class, 'destroy']);
//Material Request routes
Route::get('/material-requests', [MaterialRequestController::class, 'index']);
Route::post('/material-requests/add', [MaterialRequestController::class, 'store']);
Route::get('/material-requests/{id}', [MaterialRequestController::class, 'show']);
Route::post('/material-requests/edit/{id}', [MaterialRequestController::class, 'update']);
Route::delete('/material-requests/{id}', [MaterialRequestController::class, 'destroy']);
//Service Request routes
Route::get('/service-requests', [ServiceController::class, 'index']);
Route::post('/service-requests/add', [ServiceController::class, 'store']);
Route::get('/service-requests/{id}', [ServiceController::class, 'show']);
Route::post('/service-requests/edit/{id}', [ServiceController::class, 'update']);
Route::delete('/service-requests/{id}', [ServiceController::class, 'destroy']);
