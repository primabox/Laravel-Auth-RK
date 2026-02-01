<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MojeController;

// 1. HLAVNÍ STRÁNKA
Route::get('/', [MojeController::class, 'index']);

// 2. REGISTRACE
// Tudy se na registraci podíváš (GET)
Route::get('/registrace', function () {
    return view('moje-stranka'); // Tady máš svůj registrační formulář
});

// Tudy se data z registrace odešlou (POST)
Route::post('/registrace', [MojeController::class, 'registrace']);

// 3. PŘIHLÁŠENÍ (LOGIN)
// Tudy se na přihlášení podíváš (GET)
Route::get('/login', function () {
    return view('login');
})->name('login');

// Tudy se data z přihlášení odešlou (POST)
Route::post('/login', [MojeController::class, 'login']);

// Když někdo napíše /profil, ukaž mu ten profil
Route::get('/profil', function () {
    return view('profile'); // jméno toho nového souboru
})->middleware('auth'); // Tohle je ten bodyguard, co me tam nepustí bez loginu (takovej prostrednik)

Route::post('/logout', [MojeController::class, 'logout']);  