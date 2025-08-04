<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PackageBrowseController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;

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

// ✅ Authenticated user routes
Route::middleware('auth')->group(function () {

    // ✅ Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ✅ Package browsing (Customer)
    Route::get('/packages', [PackageBrowseController::class, 'index'])->name('packages.index');

    // ✅ Booking routes (Customer)
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/booking/{id}/receipt', [BookingController::class, 'downloadReceipt'])->name('booking.receipt');
    Route::get('/booking/confirmation/{id}', [BookingController::class, 'confirmation'])->name('booking.confirmation');
    Route::get('/bookings/{id}/confirmation', [BookingController::class, 'confirmation'])->name('bookings.confirmation');

    // ✅ Dummy payment
    Route::get('/booking/{id}/pay', [BookingController::class, 'showPaymentForm'])->name('booking.pay');
    Route::post('/booking/{id}/pay', [BookingController::class, 'processDummyPayment'])->name('booking.pay.process');

    // ✅ Email confirmation
    Route::get('/send-confirmation-email', [EmailController::class, 'sendConfirmationEmail'])->name('send.confirmation');
    Route::post('/user/send-confirmation-email', [EmailController::class, 'sendConfirmationEmail'])->name('user.sendConfirmationEmail');
});

// ✅ Admin-only routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('packages', PackageController::class);

    // Optional: Admin sends email related to a package
    Route::post('packages/{package}/send-email', [PackageController::class, 'sendEmail'])->name('packages.sendEmail');

    // Admin sends confirmation email to user
    Route::post('bookings/{booking}/send-confirmation-email', [AdminBookingController::class, 'sendConfirmationEmail'])->name('bookings.sendConfirmationEmail');
});

require __DIR__.'/auth.php';
