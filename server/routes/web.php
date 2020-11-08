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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified', 'document'])->group(function () {
    Route::get('/dashboard', \App\Http\Livewire\Dashboard::class)->name('dashboard');
    Route::get('/document/{documentId}', '\App\Http\Controllers\DocumentController@show')->name('showDocument');
});
