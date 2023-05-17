<?php

use App\Http\Controllers\ManagerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProviderController;
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


Route::view('/', 'main')->name('index');

Route::prefix('unit')->group(function () {
    Route::get('/', [UnitController::class, 'index'])->name('unit.index');
    Route::post('/store', [UnitController::class, 'store'])->name('unit.create');
    Route::get('/edit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
    Route::post('/update/{id}', [UnitController::class, 'update'])->name('unit.update');
    Route::get('/delete/{id}', [UnitController::class, 'destroy'])->name('unit.delete');
});

Route::prefix('client')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('client.index');
    Route::post('/store', [ClientController::class, 'store'])->name('client.create');
    Route::get('/edit/{id}', [ClientController::class, 'edit'])->name('client.edit');
    Route::post('/update/{id}', [ClientController::class, 'update'])->name('client.update');
    Route::get('/delete/{id}', [ClientController::class, 'destroy'])->name('client.delete');
    Route::get('/managers', [ClientController::class, 'managers'])->name('client.managers');
    Route::get('/{id}/managers', [ClientController::class, 'getManager'])->name('client.manager_id');


});

Route::prefix('manager')->group(function () {
    Route::get('/', [ManagerController::class, 'index'])->name('manager.index');
    Route::post('/store', [ManagerController::class, 'store'])->name('manager.create');
    Route::get('/edit/{id}', [ManagerController::class, 'edit'])->name('manager.edit');
    Route::post('/update/{id}', [ManagerController::class, 'update'])->name('manager.update');
    Route::get('/delete/{id}', [ManagerController::class, 'destroy'])->name('manager.delete');
});

Route::prefix('provider')->group(function () {
    Route::get('/', [ProviderController::class, 'index'])->name('provider.index');
    Route::post('/store', [ProviderController::class, 'store'])->name('provider.create');
    Route::get('/edit/{id}', [ProviderController::class, 'edit'])->name('provider.edit');
    Route::post('/update/{id}', [ProviderController::class, 'update'])->name('provider.update');
    Route::get('/delete/{id}', [ProviderController::class, 'destroy'])->name('provider.delete');
});


