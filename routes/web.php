<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImcController;
use App\Http\Controllers\DashboardController;


Route::get('/dashboard',[DashboardController::class,'index'])->name('imc.dashboard');

Route::get('/',[ImcController::class, 'index'])->name('imc.index');

Route::post('/calcular',[ImcController::class, 'calcularimc'])->name('imc.calcularimc');

Route::post('/salvar',[ImcController::class, 'store'])->name('imc.salvar');
