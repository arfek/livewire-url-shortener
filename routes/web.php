<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\RedirectToUrl;
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

Route::redirect('/', '/login');


Route::middleware(['auth'])->group(function () {
   
    Route::get('/link', [LinkController::class, 'index'] )->name('link');

    Route::get('/link/create', [LinkController::class, 'create'] )->name('link.create');

    Route::get('/link/edit', [LinkController::class, 'edit'] )->name('link.edit');
});

require __DIR__.'/auth.php';

//Redireciona todos os Slugs pro metodo Invoke
Route::get('{link:slug}', RedirectToUrl::class)->name('redirect');
