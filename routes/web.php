<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('custom-welcome');
})->name('index');

Route::middleware('guest')->group( function () {
	Route::get('/login', [AuthController::class, 'login_page'])->name('login.page');
	Route::post('/login', [AuthController::class, 'login'])->name('login.process');
	Route::get('/register', [AuthController::class, 'register_page'])->name('register.page');
	Route::post('/register', [AuthController::class, 'register'])->name('register.process');
});

Route::middleware('auth')->group( function () {
	Route::get('/home', [UserController::class, 'home'])->name('user.home');
	Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

	Route::get('/add_note', [NoteController::class, 'add_note_page'])->name('note.add.page');
	Route::post('/note', [NoteController::class, 'add_note'])->name('note.add.process');

	Route::get('/update/note/{id}', [NoteController::class, 'update_note_page'])->name('note.update.page');
	Route::put('/note', [NoteController::class, 'update_note'])->name('note.update.process');
	Route::delete('/note', [NoteController::class, 'note_by_id'])->name('note.delete');
	Route::post('/comment', [CommentController::class, 'create_comment'])->name('comment.add');
});



Route::get('/notes', [NoteController::class, 'all_notes'])->name('note.get.all');
Route::get('/note/{id}', [NoteController::class, 'note_by_id'])->name('note.get.one');

Route::get('/comments/count/{id}', [CommentController::class, 'get_comments_count_for_note'])->name('comment.count');
Route::get('/comments/{id}', [CommentController::class, 'get_comments_for_note'])->name('comment.count');