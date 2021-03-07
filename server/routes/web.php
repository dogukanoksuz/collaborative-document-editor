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
    if (auth()->check()) {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('register');
    }
});

Route::middleware(['auth:sanctum', 'verified', 'document'])->group(function () {
    Route::get('/dashboard', \App\Http\Livewire\Dashboard::class)
        ->name('dashboard');

    Route::get('/document/{documentId}', \App\Http\Livewire\Document\Edit::class)
        ->name('showDocument');

    Route::get('/document/{documentId}/share', \App\Http\Livewire\Document\Share::class)
        ->name('shareDocument');

    Route::get('/document/{documentId}/pdf', ['\App\Http\Controllers\Document\PDFController', 'renderAsHtml'])
        ->name('showDocumentAsPdf');
 
    Route::post('/document/{documentId}/save', 
                ['\App\Http\Controllers\API\DocumentController', 'save'])
        ->name('saveDocument');

    Route::get('/document/{documentId}/delete', 
                ['\App\Http\Controllers\API\DocumentController', 'delete'])
        ->name('deleteDocument');

    Route::get('/search', \App\Http\Livewire\Search::class)
        ->name('search');
});