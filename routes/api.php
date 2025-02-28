<?php
//This are modules imported from a built-in library (Request, Route)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\StudentController;

//This is how routes are defined
Route::get('/students', [StudentController::class, 'index']);

Route::get('/students/{id}', function() {
    return 'Fetching a student';
});

Route::post('/students', [StudentController::class, 'store']);

Route::put('/students/{id}', function() {
    return 'Updating student';
}); 

Route::delete('/students/{id}', function() {
    return 'Deleting student';
});

