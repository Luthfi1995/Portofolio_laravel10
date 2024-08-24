<?php

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\HomeContentController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view('admin.master');
// });

// Route::get('/register', function () {
//     return view('auth.register.register');
// })->name('register');

// Route::post('/register', [AuthController::class, 'register']);

// Route::get('/login', function () {
//     return view('auth.login.login');
// })->name('login');
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/contact', [DashboardController::class, 'store'])->name('contact.store');
// Route untuk menampilkan form kontak
// Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
// Route::post('/dashboard', [ContactController::class, 'store'])->name('contact.store');
// Route::get('/contact', [ContactController::class, 'index'])->name('contact');


// Rute untuk halaman admin dengan prefix '/admin'
Route::prefix('/admin')->group(function () {

    // Rute untuk halaman login admin
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');

    // Rute untuk halaman register admin
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/register', [AuthController::class, 'register'])->name('admin.register.submit');

    // Rute untuk logout admin
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    Auth::routes();
    // Rute untuk halaman home admin
    Route::get('/', [AdminController::class, 'index'])->name('admin.home')->middleware('auth');

    // Rute untuk konten home admin
    Route::prefix('/homeContent')->group(function () {
        Route::get('/', [HomeContentController::class, 'index'])->name('admin.home.index');
        Route::post('/store', [HomeContentController::class, 'store'])->name('admin.home.store');
        Route::get('/create', [HomeContentController::class, 'create'])->name('admin.home.create');
        Route::get('/{homes}/edit', [HomeContentController::class, 'edit'])->name('admin.home.edit');
        Route::put('/{homes}/update', [HomeContentController::class, 'update'])->name('admin.home.update');
        Route::delete('/{homes}/delete', [HomeContentController::class, 'destroy'])->name('admin.home.destroy');
    });



    // Rute untuk portofolio
    Route::prefix('/portofolio')->group(function () {
        Route::get('/', [PortofolioController::class, 'index'])->name('admin.portofolio');
        Route::post('/store', [PortofolioController::class, 'store'])->name('admin.portofolio.store');
        Route::get('/create', [PortofolioController::class, 'create'])->name('admin.portofolio.create');
        Route::get('/{portofolios}/edit', [PortofolioController::class, 'edit'])->name('admin.portofolio.edit');
        Route::put('/{portofolios}/update', [PortofolioController::class, 'update'])->name('admin.portofolio.update');
        Route::delete('/{portofolios}/delete', [PortofolioController::class, 'destroy'])->name('admin.portofolio.destroy');
    });


    // Rute untuk Abouts
    Route::prefix('/about')->group(function () {
        Route::get('/', [AboutController::class, 'index'])->name('admin.about.index');
        Route::post('/store', [AboutController::class, 'store'])->name('admin.about.store');
        Route::get('/create', [AboutController::class, 'create'])->name('admin.about.create');
        Route::get('/{abouts}/edit', [AboutController::class, 'edit'])->name('admin.about.edit');
        Route::put('/{abouts}/update', [AboutController::class, 'update'])->name('admin.about.update');
        Route::delete('/{abouts}/delete', [AboutController::class, 'destroy'])->name('admin.about.destroy');
    });
    Route::prefix('/contact')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('admin.contact.index');
        Route::delete('/{id}/delete', [ContactController::class, 'destroy'])->name('admin.contact.destroy');
    });
});
