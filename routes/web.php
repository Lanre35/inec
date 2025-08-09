<?php

use App\Livewire\DropDown;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CreateNewPollUnitController;
use App\Http\Controllers\PollingUnitResultController;
use App\Http\Controllers\TotalResultPollUnitController;


Route::view('/', 'login')->name('login');
Route::post('users.login', [UsersController::class,'login'])->name('log');
Route::resource('users', UsersController::class);


// Logout

Route::get('/logout', [UsersController::class,'logout'])->name('logout');


Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::get('/polling-unit',[PollingUnitResultController::class,'index']);
Route::get('/search', [PollingUnitResultController::class, 'show']);

Route::get('/total-result-polling-unit', [TotalResultPollUnitController::class, 'index'])->name('polling-result');
Route::get('/total', [TotalResultPollUnitController::class, 'show'])->name('total');


Route::resource('create-polling-unit', CreateNewPollUnitController::class);


Route::get('dd',[CreateNewPollUnitController::class,'getWard']);
Route::get('pol',[CreateNewPollUnitController::class,'getPollingUnit']);
Route::get('ss',[PollingUnitResultController::class,'show']);


Route::get('show', [PollingUnitResultController::class, 'show'])->name('show');

