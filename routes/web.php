<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController; // Add this line
use App\Http\Controllers\UserController; // Ensure UserController is also imported

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
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login'); // Return the login view
})->name('login.form');

Route::post('/login', [LoginController::class, 'login'])->name('login');

// Define the logout route
Route::post('/logout', function () {
    Auth::logout(); // Log the user out
    return redirect()->route('login.form'); // Redirect to the login page
})->name('logout');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
