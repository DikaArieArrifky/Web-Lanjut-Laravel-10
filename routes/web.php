<?php

use Illuminate\Support\Facades\Route; // Mengimpor fasad Route untuk mendefinisikan rute
use App\Http\Controllers\ItemController; // Mengimpor ItemController untuk digunakan dalam rute

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

Route::get('/', function () { // Mendefinisikan rute GET untuk halaman utama ('/')
    return view('welcome'); // Mengembalikan tampilan 'welcome'
});

Route::resource('items', ItemController::class); // Membuat resource route untuk ItemController yang mencakup CRUD otomatis
