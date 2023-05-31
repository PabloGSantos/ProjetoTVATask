<?php

use App\Http\Controllers\AtendenteController;
use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\VendaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return view('home');
});
Route::get('/', function () {
    return view('home');
});

Route::get('/tutorial', function () {
    return view('tutorial');
});

Auth::routes();

Route::resource('students', StudentController::class);
Route::resource('professors', ProfessorController::class);
Route::resource('paciente', PacienteController::class);
Route::resource('medico', MedicoController::class);
Route::resource('atendete', AtendenteController::class);
Route::resource('especialidades', EspecialidadeController::class);
Route::resource('vendas', VendaController::class);
Route::get('/user', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
