<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
// // return view('index');
// return "Hello World!";
// });

// // Route::get('/books', function(){
// // return "Books Page";
// // });

//public pages
Route::redirect('/', '/books');

Route::get('/books', [BookController::class, 'index'])
->name('books.index'); // optional name for the route



// new/add book form
Route::get('/books/create', [BookController::class, 'create'])
->name('books.create');

// auth guest login form 
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])
        ->name('login');
    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});

Route::get('/books/{book}', [BookController::class, 'show'])
->name('books.show');

// store new book
Route::post('/books', [BookController::class, 'store'])
->name('books.store');

Route::get('/books/edit/{book}', [BookController::class, 'edit'])
->name('books.edit');

// update book
Route::put('/books/{book}', [BookController::class, 'update'])
->name('books.update');

// deleting a book
Route::delete('/books/{book}', [BookController::class, 'destroy'])
->name('books.destroy');