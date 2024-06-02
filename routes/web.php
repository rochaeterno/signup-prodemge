<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('AdminDashboard');
})->name('home');

Route::controller(PersonController::class)->prefix('person')->group(function () {
    Route::get('/', 'index')->name('person.index');
    Route::get('/{id}', 'detail')->name('person.detail');
    Route::post('/', 'create')->name('person.create');
});
