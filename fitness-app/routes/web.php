<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
Route::get('/activities/{id}', [ActivityController::class, 'show'])->name('activities.show');
Route::get('/activities/{id}/edit', [ActivityController::class, 'edit'])->name('activities.edit');
Route::put('/activities/{id}', [ActivityController::class, 'update'])->name('activities.update');
Route::delete('/activities/{id}', [ActivityController::class, 'destroy'])->name('activities.destroy');
Route::get('/activities/search', [ActivityController::class, 'search'])->name('activities.search');

