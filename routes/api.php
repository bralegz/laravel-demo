<?php
//This are modules imported from a built-in library (Request, Route)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//This is how routes are defined
Route::get('/students', function() {
    return 'Students list';
});



