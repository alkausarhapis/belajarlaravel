<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
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

Route::get( '/', function () {
    return view( 'home', ["title" => "Home"] );
} );

// Closure (anonymous function)
Route::get( '/about', function () {
    return view( 'about', [
        "title" => "About",
        "nama" => "hapis",
        "email" => "hapis@gmail.com",
        "foto" => "nophoto.png",
    ] );
} );

// Controller
Route::get( '/blog', [PostController::class, 'index'] );

// Route model binding
Route::get( 'posts/{post:slug}', [PostController::class, 'show'] );

Route::get( '/categories', [CategoryController::class, 'categories'] );

Route::get( '/login', [LoginController::class, 'index'] )->name( 'login' )->middleware( 'guest' );
Route::post( '/login', [LoginController::class, 'authenticate'] );
Route::post( '/logout', [LoginController::class, 'logout'] );

Route::get( '/register', [RegisterController::class, 'index'] )->middleware( 'guest' );
Route::post( '/register', [RegisterController::class, 'store'] );

Route::get( '/dashboard', function () {
    return view( 'dashboard.index' );
} )->middleware( 'auth' );

Route::resource( '/dashboard/posts', DashboardPostController::class )->middleware( 'auth' );

Route::resource( '/dashboard/categories', AdminCategoryController::class )->except( 'show' )->middleware( 'admin' );