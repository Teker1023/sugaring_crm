<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Auth;



// Головна сторінка
Route::get('/', function () {
    return view('welcome');
});

// Маршрути авторизації
Auth::routes();

// Головна сторінка після входу
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Маршрут для виходу з бази
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');



// Маршрут для перегляду процедур клієнта
Route::get('clients/{client}/procedures', [ClientController::class, 'showProcedures'])->name('clients.procedures');


// Маршрут для підтвердження процедури
Route::patch('/appointments/{appointment}/confirm', [AppointmentController::class, 'confirm'])->name('appointments.confirm');


// Запис Клієнтів
Route::resource('appointments', App\Http\Controllers\AppointmentController::class);



// Послуги

Route::resource('services', ServiceController::class);


Route::resource('materials', MaterialController::class);
Route::resource('clients', ClientController::class);
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');



// маршрути для відображення форми створення та збереження клієнта:
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create'); // Маршрут для форми
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store'); // Маршрут для збереження

// Нові маршрути для відображення сторінок для операцій "Прихід" і "Списання"
Route::get('/materials/{material}/increase', [MaterialController::class, 'showIncrease'])->name('materials.showIncrease');
Route::post('/materials/{material}/increase', [MaterialController::class, 'increase'])->name('materials.increase');

Route::get('/materials/{material}/decrease', [MaterialController::class, 'showDecrease'])->name('materials.showDecrease');
Route::post('/materials/{material}/decrease', [MaterialController::class, 'decrease'])->name('materials.decrease');


// Маршрут для клієнтів
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

// Маршрути аутентифікації
Auth::routes();

// Головна сторінка сайту
Route::get('/', [HomeController::class, 'index'])->name('home');
