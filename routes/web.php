<?php
use App\Http\Controllers\bookController;
use Illuminate\Support\Facades\Route;

Route::get('/', action: [bookController::class, 'index'])->name('book.index');
Route::get('/{id}/show', action: [bookController::class, 'show'])->name('book.show');
Route::get('/create', action: [bookController::class, 'create'])->name('book.create');
Route::post('/books', action: [bookController::class, 'store'])->name('book.store');
Route::delete('/books/{id}', action: [bookController::class, 'destroy'])->name('book.destroy');
Route::get('/edit/{id}', action: [bookController::class, 'edit'])->name('book.edit');
Route::put('/book/update', action: [bookController::class, 'update'])->name('book.update');