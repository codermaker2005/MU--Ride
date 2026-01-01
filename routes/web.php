<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->name('login.submit');

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->name('register.submit');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Logout (global for all authenticated users)
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    /*
    |----------------------------------------------------------------------
    | Student Routes
    |----------------------------------------------------------------------
    */
    Route::middleware(['role:student'])
        ->prefix('student')
        ->name('student.')
        ->group(function () {

            Route::get('/dashboard', [StudentController::class, 'dashboard'])
                ->name('dashboard');

            Route::post('/rides', [StudentController::class, 'storeRide'])
                ->name('rides.store');

            Route::put('/rides/{id}', [StudentController::class, 'updateRide'])
                ->name('rides.update');

            Route::delete('/rides/{id}', [StudentController::class, 'deleteRide'])
                ->name('rides.delete');

            Route::post('/ride-requests', [StudentController::class, 'requestRide'])
                ->name('rides.request');

            Route::delete('/ride-requests/{id}', [StudentController::class, 'cancelRequest'])
                ->name('rides.cancel');

            Route::post('/ride-requests/{id}/accept', [StudentController::class, 'acceptRequest'])
                ->name('requests.accept');

            Route::post('/ride-requests/{id}/reject', [StudentController::class, 'rejectRequest'])
                ->name('requests.reject');
        });

    /*
    |----------------------------------------------------------------------
    | Admin Routes
    |----------------------------------------------------------------------
    */
    Route::middleware(['role:admin'])
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            Route::get('/dashboard', [AdminController::class, 'dashboard'])
                ->name('dashboard');

            Route::post('/users', [AdminController::class, 'storeUser'])
                ->name('users.store');

            Route::put('/users/{id}', [AdminController::class, 'updateUser'])
                ->name('users.update');

            Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])
                ->name('users.delete');

            Route::post('/locations', [AdminController::class, 'storeLocation'])
                ->name('locations.store');

            Route::put('/locations/{id}', [AdminController::class, 'updateLocation'])
                ->name('locations.update');

            Route::delete('/locations/{id}', [AdminController::class, 'deleteLocation'])
                ->name('locations.delete');

                Route::post('/rides/{ride}/approve', [AdminController::class, 'approveRide'])
                ->name('rides.approve');

            Route::post('/rides/{ride}/reject', [AdminController::class, 'rejectRide'])
                ->name('rides.reject');

            Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

             Route::post('/rides/{ride}/approve', [AdminController::class, 'approve'])
                ->name('admin.rides.approve');

            Route::post('/rides/{ride}/reject', [AdminController::class, 'reject'])
                ->name('admin.rides.reject');

            });

        });
});
