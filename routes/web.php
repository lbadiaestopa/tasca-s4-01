<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\OrchestraController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MembershipController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::get('/orchestras', [OrchestraController::class, 'index'])
            ->name('orchestras');
    Route::get('/orchestras/{orchestra}', [OrchestraController::class, 'show'])
        ->name('orchestras.show');

    Route::get('/orchestras/{orchestra}/programs/{program}', [ProgramController::class, 'show'])
            ->name('programs.show');
    
    Route::get('/orchestras/{orchestra}/programs/{program}/events/{event}', [EventController::class, 'show'])
            ->name('events.show');

    Route::middleware(RoleMiddleware::class)->group(function () {
        Route::get('/create-orchestra', [OrchestraController::class, 'create'])
            ->name('orchestras.create');
        Route::post('create-orchestra', [OrchestraController::class, 'store']);

        Route::get('/edit-orchestra/{id}', [OrchestraController::class, 'edit'])
            ->name('orchestras.edit');
        Route::post('/edit-orchestra/{id}', [OrchestraController::class, 'update'])
            ->name('orchestra.update');

        Route::delete('/orchestras/{orchestra}', [OrchestraController::class, 'destroy'])
            ->name('orchestras.destroy');

        Route::get('/orchestras/{orchestra}/programs/create', [ProgramController::class, 'create'])
            ->name('program.create');
        Route::post('/orchestras/{orchestra}/programs', [ProgramController::class, 'store'])
            ->name('program.store');

        Route::get('/orchestras/{orchestra}/programs/{program}/edit', [ProgramController::class, 'edit'])
            ->name('programs.edit');
        Route::put('/orchestras/{orchestra}/programs/{program}', [ProgramController::class, 'update'])
            ->name('programs.update');

        Route::delete('/orchestras/{orchestra}/programs/{program}', [ProgramController::class, 'destroy'])
            ->name('programs.destroy');

        Route::get('/orchestras/{orchestra}/programs/{program}/events/create', [EventController::class, 'create'])
            ->name('event.create');
        Route::post('/orchestras/{orchestra}/programs/{program}/events', [EventController::class, 'store'])
            ->name('event.store');

        Route::get('/orchestras/{orchestra}/programs/{program}/events/{event}/edit', [EventController::class, 'edit'])
            ->name('events.edit');
        Route::put('/orchestras/{orchestra}/programs/{program}/events/{event}', [EventController::class, 'update'])
            ->name('events.update');

        Route::delete('/orchestras/{orchestra}/programs/{program}/events/{event}', [EventController::class, 'destroy'])
            ->name('events.destroy');

        Route::get('members/create', [MemberController::class, 'create'])
            ->name('members.create');
        Route::post('members', [MemberController::class, 'store'])
            ->name('members.store');

        Route::get('/orchestras/{orchestra}/members/{membership}', [MemberController::class, 'show'])
            ->name('members.show');

        Route::get('/orchestras/{orchestra}/members/{membership}/edit', [MembershipController::class, 'edit'])
            ->name('memberships.edit');
        Route::put('/orchestras/{orchestra}/members/{membership}', [MembershipController::class, 'update'])
            ->name('memberships.update');

        Route::delete('/orchestras/{orchestra}/members/{membership}', [MembershipController::class, 'destroy'])
            ->name('memberships.destroy');

        Route::get('memberships/create', [MembershipController::class, 'create'])
            ->name('memberships.create');
        Route::post('memberships', [MembershipController::class, 'store'])
            ->name('memberships.store');
    });
});

require __DIR__ . '/auth.php';
