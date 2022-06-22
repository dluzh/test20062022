<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntryController;
use App\Support\RssReader;

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


/* ---------- FEEDS CRUD ---------- */
Route::group(['prefix' => 'entry'], function () {
    Route::get('/', [EntryController::class, 'index'])->name('entry.index');
    Route::get('/{entry}/edit', [ EntryController::class, 'edit' ])->name('entry.edit');
    Route::put('/{entry}/update', [ EntryController::class, 'update' ])->name('entry.update');
    Route::get('/{entry}/delete', [ EntryController::class, 'destroy' ])->name('entry.delete');
    Route::get('/create', [ EntryController::class, 'create' ])->name('entry.create');
    Route::post('/', [ EntryController::class, 'store' ])->name('entry.store');
});

Route::get('/grab', function () {
    $wat = Artisan::call('cron:process-feeds');
    return "Processed " . $wat;
});
