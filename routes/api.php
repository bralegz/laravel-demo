<?php
//This are modules imported from a built-in library (Request, Route)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//This is how routes are defined
Route::get('/students', function() {
    return 'Students list';
});

Route::get('/students/{id}', function() {
    return 'Fetching a student';
});

Route::post('/students', function() {
    return 'Creating a student';
});

Route::put('/students/{id}', function() {
    return 'Updating student';
}); 

Route::delete('/students/{id}', function() {
    return 'Deleting student';
});

