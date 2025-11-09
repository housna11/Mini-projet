<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',function(){
    return 'accueil';
});
Route::get('/500', function () {
    abort(500);
});
Route::get('/404', function () {
    abort(404);
});
Route::post('/419', function () {
    return 'Formulaire envoye';
});
