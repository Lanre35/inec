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

Route::get('/logout', [UsersController::class,'logout'])->name('logout')->middleware('auth');


Route::view('/dashboard', 'dashboard')->name('dashboard')->middleware('auth');
Route::get('/polling-unit',[PollingUnitResultController::class,'index'])->middleware('auth');
Route::get('/search', [PollingUnitResultController::class, 'show'])->middleware('auth');

Route::get('/total-result-polling-unit', [TotalResultPollUnitController::class, 'index'])->name('polling-result')->middleware('auth');
Route::get('/total', [TotalResultPollUnitController::class, 'show'])->name('total')->middleware('auth');


Route::resource('create-polling-unit', CreateNewPollUnitController::class)->middleware('auth');


Route::get('dd',[CreateNewPollUnitController::class,'getWard'])->middleware('auth');
Route::get('pol',[CreateNewPollUnitController::class,'getPollingUnit'])->middleware('auth');
Route::get('ss',[PollingUnitResultController::class,'show'])->middleware('auth');


Route::get('show', [PollingUnitResultController::class, 'show'])->name('show')->middleware('auth');

