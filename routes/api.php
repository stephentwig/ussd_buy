<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('contacts',  [ContactController::class , 'show'])->name('getAllCustomerContacts');

Route::get('contacts/{id}',  [ContactController::class , 'index'])->name('contact.index');

Route::get('contacts/isblacklisted/{contact_number}',  [ContactController::class , 'isBlacklisted'])->name('contact.isBlacklisted');

Route::post('contacts',  [ContactController::class , 'store'])->name('contact.store');

Route::put('contacts/{id}',  [ContactController::class , 'edit'])->name('contact.edit');

Route::delete('contacts/{id}', [ContactController::class , 'destroy'])->name('contact.delete');

Route::patch('contacts/blacklist/{contact}',  [ContactController::class , 'blacklist'])->name('contact.blacklist');