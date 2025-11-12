<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;

// Resource routes for CRUD operations (extra credit: route resources)
Route::resource('activities', ActivityController::class);

// Additional search route
Route::get('/activities/search', [ActivityController::class, 'search'])->name('activities.search');

// Root route redirects to activities index
Route::get('/', function () {
    return redirect()->route('activities.index');
});

