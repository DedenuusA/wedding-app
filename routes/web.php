<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\WeddingController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\Admin\RsvpAdminController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/wedding', [WeddingController::class, 'edit'])->name('wedding.edit');
    Route::post('/wedding', [WeddingController::class, 'update'])->name('wedding.update');
    Route::get('/rsvps', [RsvpAdminController::class, 'index'])->name('admin.rsvps');
    Route::get('/kirim/whatsApp', [RsvpAdminController::class, 'kirimwa'])->name('kirim.wa');
});

Route::get('/w/{slug}', [InvitationController::class, 'show'])->name('wedding.link');
Route::post('/rsvp', [RsvpController::class, 'store'])->name('rsvp.store');

require __DIR__.'/auth.php';
