<?php

use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return view('custom-welcome');
});

// Страница для создания заметки (POST-запрос)
Route::get('/create-note', [NoteController::class, 'showCreateForm']);
Route::post('/create-note', [NoteController::class, 'storeNote']);

// Страница для получения всех заметок (GET-запрос)
Route::get('/all-notes', [NoteController::class, 'showAllNotes']);
