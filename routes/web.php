<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImcController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\Autentication;
use App\Http\Controllers\RegistroController;

Route::get('/dashboard',[DashboardController::class,'index'])->name('imc.dashboard');

Route::get('/',[ImcController::class, 'index'])->name('imc.index');

Route::post('/calcular',[ImcController::class, 'calcularimc'])->name('imc.calcularimc');

Route::post('/salvar',[ImcController::class, 'store'])->name('imc.salvar');

Route::put('/dashboard/update{id}', [DashboardController::class,'update'])->name('dash.update');

Route::delete('/dashboard/delete/{id}', [DashboardController::class,'destroy'])->name('dash.delete');

Route::get('/registro', [RegistroController::class,'index'])->name('users.create');
Route::post('/registro', [RegistroController::class,'store'])->name('users.store');





Route::middleware(Autentication::class)->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('imc.dash');

});


Route::get('/login',[LoginController::class,'index'])->name('login');

Route::post('/login',[LoginController::class,'logar'])->name('logar');

Route::get('/logout',[LoginController::class,'destroy'])->name('logout');
