<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController; // Ensure AdminController is imported
use App\Http\Controllers\UserController; // Ensure UserController is imported
use App\Http\Controllers\CategoryController; // Ensure CategoryController is imported
use App\Http\Controllers\ProductController; // Ensure ProductController is imported
use App\Http\Controllers\CityController; // Ensure CityController is imported
use App\Http\Controllers\ParameterController; // Ensure ParameterController is imported

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

// Middleware to check if user is authenticated
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard'); // Admin dashboard
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard'); // User dashboard
});

// Redirect users to their respective dashboards if already authenticated
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form')->middleware('guest'); // Ensure guests can access login
Route::post('/login', [LoginController::class, 'login'])->name('login.submit')->middleware('redirectIfAuthenticated');

// Define the logout route
Route::post('/logout', function () {
    Auth::logout(); // Log the user out
    return redirect()->route('login.form'); // Redirect to the login page
})->name('logout');

// Middleware to check if user is authenticated
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () { // Assuming you have an 'admin' middleware
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories'); // List categories
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create'); // Create category
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store'); // Store category

    // Define routes for products
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products'); // List products
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create'); // Create product
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store'); // Store product

    // Define routes for cities
    Route::get('/admin/cities', [CityController::class, 'index'])->name('admin.cities'); // List cities
    Route::get('/admin/cities/create', [CityController::class, 'create'])->name('admin.cities.create'); // Create city
    Route::post('/admin/cities', [CityController::class, 'store'])->name('admin.cities.store'); // Store city

    // Define routes for parameters
    Route::get('/admin/parameters', [ParameterController::class, 'index'])->name('admin.parameters'); // List parameters
    Route::get('/admin/parameters/create', [ParameterController::class, 'create'])->name('admin.parameters.create'); // Create parameter
    Route::post('/admin/parameters', [ParameterController::class, 'store'])->name('admin.parameters.store'); // Store parameter
    // Add more routes as needed
});

