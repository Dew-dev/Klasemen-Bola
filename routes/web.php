<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\mainController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/teams',[mainController::class,'teams']);
Route::post('/teams/insert',[mainController::class,'insert']);
Route::get('/matches',[mainController::class,'matches']);
Route::get('/matches/single',[mainController::class,'single']);
Route::post('/matches/saveSingle',[mainController::class,'saveSingleMatches']);
Route::get('/getTeams',[mainController::class,'getTeams']);
Route::get('/getMatches',[mainController::class,'getMatches']);
Route::get('/matches/multiple',[mainController::class,'multiple']);