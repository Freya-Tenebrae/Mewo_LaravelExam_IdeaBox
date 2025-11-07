<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\IdeaController;

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

    Route::resource('ideas', IdeaController::class);

    Route::get('/dashboard', function () {
        return redirect()->route('ideas.index');
    })->name('dashboard');
});