<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\System\WhatsAppMessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

#Routes users
Route::controller(WhatsAppMessageController::class)
    ->prefix('messages')
    ->as('message-')
    ->group(function () {

        Route::get('index', 'index')->name('index');
        Route::get('show', 'show')->name('show');
        Route::get('akeditor', 'akeditor')->name('akeditor');

    });
