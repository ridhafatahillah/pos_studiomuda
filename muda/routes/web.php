<?php

use App\Http\Controllers\rekap;
use App\Http\Controllers\Customer;
use App\Http\Controllers\Login;
use App\Http\Controllers\pelanggan;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\sudahLogin;
use Illuminate\Support\Facades\Route;





Route::post('/post', [Customer::class, 'store'])->name('store');
Route::post('/edit', [Customer::class, 'updateAndSend']);

Route::get('/customer', function () {
    return view('home', ['title' => 'Rekap']);
});


// Route::post('/bayar', [Customer::class, 'bayar']);

// buat route untuk post ke bayar dan dd hasil postnya
Route::post('/bayar', [Customer::class, 'bayar']);
Route::get('/cetak', [Customer::class, 'cetak']);
Route::get('login', [Login::class, 'index'])->middleware(sudahLogin::class);
Route::post('login', [Login::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/', [Customer::class, 'index'])->name('home');
    Route::get('/rekap', [rekap::class, 'index'])->name('rekap');

    Route::get('logout', function () {
        auth()->logout();
        return redirect('login');
    });
});

Route::post('register', [Login::class, 'register'])->name('register');

// buat middleware group isAdmin
Route::middleware('auth', isAdmin::class)->group(function () {
    Route::get('/master', [pelanggan::class, 'index']);
    Route::get('/hapus/{id}', [rekap::class, 'hapus']);
});




Route::get('/delete/{id}', [Customer::class, 'destroy']);
