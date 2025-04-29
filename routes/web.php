<?php
/*
        |--------------------------------------------------------------------------
        | WELCOME TO THE ROUTES! (c) Stone.id 2025
        |--------------------------------------------------------------------------
        |
        | The routes basically used for map URLs to controller methods or closures,
        | these routes use 3 middleware; guest, users, and agent for preventing
        | non-roles action. the non-middleware routes are free to access
        |
        | Developed and created by William Christian Fabrianto with finnesse lol
        |
        */

use App\Http\Controllers\Auth\AgentRegisterController;
use App\Http\Controllers\Auth\OtpLoginController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\Dashboard\AgentController;
use App\Http\Controllers\Dashboard\AgentListingController;
use App\Http\Controllers\Dashboard\HistoryTransactionController;
use App\Http\Controllers\Dashboard\OverviewController;
use App\Http\Controllers\Dashboard\RentUtilityController;
use App\Http\Controllers\Dashboard\TransactionProcessController;
use App\Http\Controllers\FindAgentController;
use App\Http\Controllers\ListingRequestController;
use App\Http\Controllers\PublicListingController;
use App\Http\Controllers\StonePagesController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StonePagesController::class, 'index'])->name('home');
Route::get('/property-listings', [PublicListingController::class, 'index'])->name('property.listings');
Route::get('/property/{id_preview}-{slug?}', [PublicListingController::class, 'show'])->name('property.show');
Route::get('/kpr', [StonePagesController::class, 'mortgage'])->name('mortgage');
Route::get('/bantuan', [StonePagesController::class, 'contact'])->name('contact-us');
Route::get('/cari-agen', [FindAgentController::class, 'index'])->name('cari-agen');
Route::get('/cari-agen/{id}', [FindAgentController::class, 'show'])->name('view-agent');

Route::middleware('guest')->group(function () {
    Route::get('/user/register', [UserRegisterController::class, 'showRegistration'])->name('user.register');
    Route::post('/register/07482124789029', [UserRegisterController::class, 'register'])->name('register');

    // login via OTP
    Route::get('/user/login', [OtpLoginController::class, 'showLoginForm'])->name('user.login');
    Route::post('/login-otp/490884248750', [OtpLoginController::class, 'sendOtp'])->name('otp.send');
    Route::get('/user/verify-otp', [OtpLoginController::class, 'showVerifyForm'])->name('otp.verify.form');
    Route::post('/otp/resend/8734677628726105', [OtpLoginController::class, 'resend'])->name('otp.resend');
    Route::post('/verify-otp/89041328432834', [OtpLoginController::class, 'verifyOtp'])->name('otp.verify');

    Route::get('/user/forgot-password', fn() => view('auth.forgot-password'))->name('user.forgot-password');
    Route::get('/user/reset-password', fn() => view('auth.reset-password'))->name('user.reset-password');
    Route::get('/agent/register', [AgentRegisterController::class, 'index'])->name('agent.register');

});

//manual guard by auth checking in controller
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user', [UserProfileController::class, 'show'])->name('stone.user-profile');
    Route::post('/user/request-listing/9408231904390238', [ListingRequestController::class, 'store'])->name('stone.request-listing');
    Route::get('/user/edit-profile', [UserProfileController::class, 'edit'])->name('stone.user-edit-profile');
    Route::post('/user/update-profile', [UserProfileController::class, 'update'])->name('stone.profile-update');

    Route::post('/property/{property}/favorite', [PublicListingController::class, 'toggleFavorite'])->name('stone.property.favorite');
    Route::delete('/user/favorite/{property}/remove', [PublicListingController::class, 'removeFavorite'])->name('stone.remove-favorite');

    Route::delete('/listing-requests/{id}/delete', [ListingRequestController::class, 'destroy'])
        ->name('listing_requests.destroy');
});

//agent dashboard
Route::middleware(['auth', 'role:agent'])
    ->prefix('dashboard-agent')
    ->name('dashboard-agent.')
    ->group(function () {
        Route::get('/', [OverviewController::class, 'index'])->name('index');
        Route::get('/pool-user', [ListingRequestController::class, 'show'])->name('pool-user');
        Route::post('/pool-user/accept', [ListingRequestController::class, 'accept'])->name('pool-user.accept');
        Route::post('/buat-iklan/82347342723443342',
            [AgentListingController::class, 'store'])->name('store-listing');

        /*
        |--------------------------------------------------------------------------
        | CRUD Property listing agent
        |--------------------------------------------------------------------------
        |
        | These are the routes for managing property listing agent made.
        | Controller    : AgentListingController
        | View          : dashboard/pages/
        |
        */
        Route::get('/iklan-saya', [AgentListingController::class, 'index'])->name('my-listing');
        Route::get('/buat-iklan', [AgentListingController::class, 'create'])->name('create-listing');
        Route::get('/iklan-saya/{id}/ubah-iklan', [AgentListingController::class, 'edit'])->name('edit-listing');
        Route::put('/iklan-saya/update-iklan/', [AgentListingController::class, 'updateListing'])->name('update-listing');
        Route::post('/hapus-iklan/9481239083412', [AgentListingController::class, 'delete'])->name('delete-listing');
        Route::delete('/property/{property}/image/{image}', [AgentListingController::class, 'removeImage'])->name('property.removeImage');

        Route::get('/edit-profil', [AgentController::class, 'edit'])->name('edit-profile');
        Route::put('/update-profil', [AgentController::class, 'update'])->name('update-profile');

        // on off toggle property
        Route::post('/property/{id}/status', [AgentListingController::class, 'updateStatus'])->name('toggle-listing');

        // Route::get('/transaction/{id_preview}/start', [TransactionProcessController::class, 'start'])->name('transaction.start');
        Route::get('/transaction/{id_preview}/process/{step}', [TransactionProcessController::class, 'show'])->name('transaction.process');
        Route::post('/transaction/{id_preview}/process/{step}', [TransactionProcessController::class, 'save'])->name('transaction.process.save');
        Route::get('/transaction/success/{id_preview}', [TransactionProcessController::class, 'success'])->name('transaction.success');

        Route::get('/dashboard/rent/{id_preview}/utility', [RentUtilityController::class, 'show'])->name('rent-utility');

        Route::get('/history-transactions', [HistoryTransactionController::class, 'index'])->name('history-index');
        Route::get('/history-transactions/{id}', [HistoryTransactionController::class, 'show'])->name('history-show');

        // FILTER AND SORT FOR MY LISTING
        Route::get('/filter-properties', [AgentListingController::class, 'filterSort'])->name('property-filterSort');

    });
