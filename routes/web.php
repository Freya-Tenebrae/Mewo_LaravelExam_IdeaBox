<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\AuthController;

Route::get('/',[
    PageController::class, 'welcome'
])->name('welcome');

Route::get('/inscription', [
    AuthController::class, 'showRegisterForm'
])->name('register');

Route::post('/inscription', [
    AuthController::class, 'register'
]);

Route::get('/connexion', [
    AuthController::class, 'showLoginForm'
])->name('login');
    
Route::post('/connexion', [
    AuthController::class, 'login'
]);

Route::post('/deconnexion', [
    AuthController::class, 'logout'
])->name('logout');

Route::middleware(['auth'])->group(function (){

    Route::get('/dashboard',[
        IdeaController::class, 'dashboard'
    ])->name('dashboard');

    Route::resource('ideas', IdeaController::class);
});