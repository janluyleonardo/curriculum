<?php

use App\Http\Controllers\aboutController;
use App\Http\Controllers\experienceController;
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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // Route::get('/about', function () {
    //     return view('cv/about');
    // })->name('about');
    Route::resource('/about', aboutController::class);

    // Route::get('/experience', function () {
    //     return view('cv/experience');
    // })->name('experience');
    Route::resource('/experience', experienceController::class);

    Route::get('/education', function () {
        return view('cv/education');
    })->name('education');

    Route::get('/skills', function () {
        return view('cv/skills');
    })->name('skills');
    Route::get('/interests', function () {
        return view('cv/interests');
    })->name('interests');
    Route::get('/awards', function () {
        return view('cv/awards');
    })->name('awards');
});
