<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])
    ->name('home_page');

Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])
    ->name('user_page')
    ->middleware('auth');

Route::get('/users/{user:slug}', [App\Http\Controllers\UserController::class, 'show'])
    ->name('user_show')
    ->middleware('auth');

Route::get('/users/{user:slug}/edit', [App\Http\Controllers\UserController::class, 'edit'])
    ->name('user_edit')
    ->middleware('auth');


Route::post('/team', [\App\Http\Controllers\TeamController::class, 'store'])
    ->name('store_team')
    ->middleware('auth');

Route::get('/team', [App\Http\Controllers\TeamController::class, 'index'])
    ->name('team_page')
    ->middleware('auth');

Route::get('/team/create', [App\Http\Controllers\TeamController::class, 'create'])
    ->name('create_team')
    ->middleware('auth', 'can:create, App\Models\Team');

Route::get('/team/{team:slug}', [App\Http\Controllers\TeamController::class, 'show'])
    ->name('team_show')
    ->middleware('auth');

Route::put('/team/{team:slug}', [App\Http\Controllers\TeamController::class, 'update'])
    ->name('team_update')
    ->middleware('auth');

Route::get('/team/{team:slug}/edit', [App\Http\Controllers\TeamController::class, 'edit'])
    ->name('team_edit')
    ->middleware('auth', 'can:update, App\Models\Team');



Route::post('/match', [App\Http\Controllers\MatchController::class, 'store'])
    ->name('store_match')
    ->middleware('auth');

Route::get('/match/create', [App\Http\Controllers\MatchController::class, 'create'])
    ->name('create_match')
    ->middleware('auth', 'can:create, App\Models\Match');



