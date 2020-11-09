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

    Route::get('/document/{documentId}', \App\Http\Livewire\Document\Edit::class)
        ->name('showDocument')
        ->where([
            'documentId' => '[0-9]+'
        ]);
        
    Route::get('/folder/{folderId}', \App\Http\Livewire\Folder\ListContents::class)
        ->name('listFolderContents')
        ->where([
            'folderId' => '[0-9]+'
        ]);
});
