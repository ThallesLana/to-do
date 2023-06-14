<?php

use Illuminate\Support\Facades\Route;

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

// Rota para exibir o formulário de registro
Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');

// Rota para lidar com o registro do usuário
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');

// Rota para exibir o formulário de login
Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');

// Rota para lidar com o login do usuário
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');


Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    // Rotas protegidas aqui
    Route::get('/todo', function () {
        return view('todo');
    });
});
