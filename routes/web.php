<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\BookingController; // 
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PackageBrowseController;
Route::get('/', function () {
    return view('welcome');
});

// ✅ Dashboard route - role-based UI

Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return view('admin.dashboard');
    } else {
        return app(PackageBrowseController::class)->index();
    }
})->middleware(['auth'])->name('dashboard');

// ✅ Profile & customer-only routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
     Route::get('/packages', [PackageBrowseController::class, 'index'])->name('packages.index')->middleware('auth');
     Route::get('/booking/{id}/receipt', [BookingController::class, 'downloadReceipt'])->name('booking.receipt');


    // ✅ Booking Routes (Customer)
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

    // ✅ View Packages (Customer)
    Route::get('/packages', [\App\Http\Controllers\PackageController::class, 'index'])->name('packages.index');
    Route::get('/booking/confirmation/{id}', [BookingController::class, 'confirmation'])->name('booking.confirmation');
    Route::get('/booking/confirmation/{id}', [BookingController::class, 'confirmation'])->name('booking.confirmation');
    Route::get('/bookings/{id}/confirmation', [BookingController::class, 'confirmation'])->name('bookings.confirmation');
    Route::get('/booking/{id}/pay', [BookingController::class, 'showPaymentForm'])->name('booking.pay');
Route::post('/booking/{id}/pay', [BookingController::class, 'processDummyPayment'])->name('booking.pay.process');



});

// ✅ Admin-only routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('packages', PackageController::class);
});

require __DIR__.'/auth.php';
