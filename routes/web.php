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



Route::post('/match', [App\Http\Controllers\MatchController::class, 'store'])
    ->name('store_match')
    ->middleware('auth');

Route::get('/match/create', [App\Http\Controllers\MatchController::class, 'create'])
    ->name('create_match')
    ->middleware('auth', 'can:create, App\Models\Match');



