<?php

use App\Http\Controllers\aboutController;
use App\Http\Controllers\experienceController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\skillsController;
use App\Http\Controllers\interestsController;
use App\Http\Controllers\awardsController;
use App\Http\Controllers\previewController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    Route::resource('/about', aboutController::class);

    Route::resource('/experience', experienceController::class);

    Route::resource('/education', educationController::class);

    Route::resource('/skills', skillsController::class);

    Route::resource('/interests', interestsController::class);

    Route::resource('/awards', awardsController::class);

    Route::resource('/preview', previewController::class);
});
