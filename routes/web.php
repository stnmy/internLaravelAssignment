<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/create', function () {
    return view('create');
});

Route::post('/create-project', [ProjectController::class, 'createProject']);

// Route to show the edit form
Route::get('/edit/{id}', [ProjectController::class, 'viewProject'])->name('edit');

// Route to handle the form submission (update the project)
Route::post('/edit/{id}', [ProjectController::class, 'updateProject']);

Route::delete('/delete/{id}', [ProjectController::class, 'deleteProject']);
Route::get('/projects', [ProjectController::class, 'listProjects']);
