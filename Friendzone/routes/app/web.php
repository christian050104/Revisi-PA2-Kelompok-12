<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Web\FoodController;
use App\Http\Controllers\Web\BookingController;
use App\Http\Controllers\Web\RuanganController;
use App\Http\Controllers\Web\KritikSaranController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\CheckoutController;
use App\Http\Controllers\Web\PengumumanController;
use App\Http\Controllers\Web\HistoryController;
use App\Http\Controllers\Web\UserGalleryController;
use App\Http\Controllers\Web\RatingController;
use App\Http\Controllers\Web\DashboardController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request; // Add this import


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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('auth/index', [AuthController::class, 'login'])->name('auth.index');
Route::get('auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('logout', [AuthController::class, 'do_logout'])->name('logout');
Route::prefix('auth')->name('web.')->group(function () {
    Route::post('login', [AuthController::class, 'do_login'])->name('login');
    Route::post('register', [AuthController::class, 'do_register'])->name('register');
    Route::post('forgot', [AuthController::class, 'do_forgot'])->name('forgot');
    Route::get('reset/{token}', [AuthController::class, 'reset'])->name('getreset');
    Route::post('reset', [AuthController::class, 'do_reset'])->name('reset');

    Route::get('counter_cart', [CartController::class, 'notif'])->name('counter_cart');
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('cart/add/{cart}', [CartController::class, 'store'])->name('cart.add');
    Route::delete('cart/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::patch('cart/increase/{cart}', [CartController::class, 'increase'])->name('cart.increase');
    Route::patch('cart/decrease/{cart}', [CartController::class, 'decrease'])->name('cart.decrease');
    Route::patch('cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');

    Route::get('checkout/customer', [CheckoutController::class, 'customer'])->name('checkout.customer');
    Route::post('checkout/customer', [CheckoutController::class, 'updateCustomer'])->name('checkout.updateCustomer');
    Route::get('checkout/shipping', [CheckoutController::class, 'shipping'])->name('checkout.shipping');
    Route::get('checkout/payment', [CheckoutController::class, 'payment'])->name('checkout.payment');
    Route::get('checkout/{order}/export-pdf', [CheckoutController::class, 'exportPDF'])->name('checkout.export.pdf');
    Route::post('check', [CheckoutController::class, 'check'])->name('check');
    Route::post('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::get('checkout/detail/{order}', [CheckoutController::class, 'detail'])->name('checkout.detail');
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('daftarmenu/menudetail/{id}', [FoodController::class, 'detail'])->name('menudetail');
    Route::get('daftarmenu', [FoodController::class, 'index'])->name('daftarmenu');
    Route::get('/daftarmenu/search', [FoodController::class, 'search'])->name('search');
    Route::get('/daftarmenu/filter', [FoodController::class, 'filterMenu']);
    Route::get('ruangan', [RuanganController::class, 'index'])->name('ruangan');
    Route::get('/ruangan/search', [RuanganController::class, 'search'])->name('search');
    Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
    Route::get('/order/detail/{order}', [CheckoutController::class, 'show'])->name('order.detail');
    Route::get('/galleries', [UserGalleryController::class, 'index'])->name('user.gallery.index');
    Route::post('/rating/store/{product}', [RatingController::class, 'store'])->name('web.rating.store');
});






Route::redirect('/', 'dashboard', 301);
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
// Route::get('/', function () {
//     return view('pages.web.dashboard.home');
// });
Route::get('/auth', function () {
    return view('pages.auth.login');
});
Route::get('/authreg', function () {
    return view('pages.auth.register');
});

Route::resource('booking', BookingController::class);
Route::resource('kritiksaran', KritikSaranController::class);
