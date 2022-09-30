<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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


Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::view('profile', 'profile')->name('profile');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])
        ->name('profile.update');

    Route::resource('tasks', \App\Http\Controllers\TaskController::class);

    /* contact web routes*/



    Route::get('contacts/all',  [ContactController::class , 'indexPaginate'])->name('contact.list.view');

    Route::get('contacts',  [ContactController::class , 'show'])->name('getAllCustomerContacts');

    Route::get('contacts/{id}',  [ContactController::class , 'index'])->name('contact.index');

    Route::get('contacts/isblacklisted/{contact_number}',  [ContactController::class , 'isBlacklisted'])->name('contact.isBlacklisted');

    Route::post('contacts',  [ContactController::class , 'store'])->name('contact.store');

    Route::get('contacts/edit/{id}',  [ContactController::class , 'edit'])->name('contact.edit');

    Route::put('contacts/update/{id}',  [ContactController::class , 'update'])->name('contact.update');

    Route::get('contacts/delete/{id}', [ContactController::class , 'destroy'])->name('contact.delete');

    Route::get('contacts/blacklist/{contact}',  [ContactController::class , 'blacklist'])->name('contact.blacklist');

});

require __DIR__.'/auth.php';
