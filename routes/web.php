<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\OrchestraController;
use App\Http\Controllers\ProgramController;
use App\Http\Middleware\EnsureOnboardingIsCompleted;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('register-2', [OnboardingController::class, 'step2'])
        ->name('register-2');

    Route::post('create-member-account', [OnboardingController::class, 'createMemberAccount'])
        ->name('create-member-account');

    Route::post('create-admin-account', [OnboardingController::class, 'createAdminAccount'])
        ->name('create-admin-account');

    Route::middleware(EnsureOnboardingIsCompleted::class)->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::middleware(RoleMiddleware::class)->group(function () {
            Route::get('/orchestras', [OrchestraController::class, 'index'])->name('orchestras');

            Route::get('/orchestras/{orchestra}', [OrchestraController::class, 'show'])->name('orchestras.show');

            Route::get('/create-orchestra', [OrchestraController::class, 'create'])->name('orchestras.create');
            Route::post('create-orchestra', [OrchestraController::class, 'store']);

            Route::get('/edit-orchestra/{id}', [OrchestraController::class, 'edit'])
                ->name('orchestras.edit');
            Route::post('/edit-orchestra/{id}', [OrchestraController::class, 'update'])
                ->name('orchestra.update');;
        });
    });
});

require __DIR__ . '/auth.php';
