<?php

use App\Http\Controllers\Api\V1\StudentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TeacherController;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::get('auth/login', LoginController::class);



Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('students', StudentController::class);
    Route::apiResource('teachers', TeacherController::class);
});

