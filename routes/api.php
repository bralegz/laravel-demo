<?php
//This are modules imported from a built-in library (Request, Route)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\StudentController;

//This is how routes are defined
Route::get('/students', [StudentController::class, 'index']);

Route::get('/students/{id}', [StudentController::class, 'show']);

Route::post('/students', [StudentController::class, 'store']); //Create resource

Route::put('/students/{id}', [StudentController::class, 'update']); //Update all fields

Route::delete('/students/{id}', [StudentController::class, 'destroy']); //Delete resource

